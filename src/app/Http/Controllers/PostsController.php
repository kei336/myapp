<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Tag;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct(){
        $user = Auth::user();
        return([
            'user' => $user
        ]);
    }

    public function index(Request $request){
        // $page = 1;
        // if (isset($request->page)){
        //     $page = $request->page;
        // }
            
        $posts = Post::latest()->paginate(6);
        // $user_a = Post::latest();
        // $aaa = User::findorFail($user_a);
        // $user_name = $aaa->name;
        $user_id = Auth::id();
        // $posts = Post::orderBy('created_at', 'desc')->get();と同じ意味
        if(!empty($request->tag)){
            $oneTagRecord = Tag::where('name',$request->tag)
            ->first();
            // リクエストで送られてきたタグの名前に一致する最初のレコードを取得
            $tag = $oneTagRecord->name;
            // 一致したレコードのnameを取得
            $data = array(
                'tag' => $tag
            );
            $postList = $oneTagRecord->posts()
            ->latest()->paginate(6);
        }else{
            $postList = Post::latest()->paginate(6);
            $data = array(
                'tag' => null
            );
        }
        $num = count($postList);

        foreach($postList as $postRecord){
            $tags = $postRecord->tags()->orderby('tag_id')->get();
            // $postListに対してタグをタグID順に取得
            $tagName = [];
            $exchangeArray = 0;
            foreach($tags as $tagRecord){
                $tagName[] = $tagRecord->name;
                // 配列にタグのを全て入れる
                if($request->tag === $tagRecord->name){
                    $exchangeArray = count($tagName) - 1;
                    // リクエストのタグと一致した場合、変数にいれる　-1は配列に合わせる為
                }
            }
                   
            $postRecord['tags'] = $tagName;
            //送るデータに追加（同foreachで回すため）
        }
        if(Auth::check()){
            return view('posts.index')->with([
                'posts' => $posts,
                'user_id' => $user_id,
                // 'page' => $page,''
                // 'user_name' => $user_name,
                'postList' => $postList,
                'num' => $num,
                'data' => $data,
            ]);
        }
        return view('auth/login');
        
    }

    public function show($id){
        $post = Post::findorFail($id);
        // $tags = $post->tags()->orderby('tag_id')->get();
        // $tagName = [];
        // foreach($tags as $tag){
        //     $tagName[] = $tag->name;
        // }
        // $tag['tags'] = $tagName;
        // データが見つからなかった場合例外を返す
        return view('posts.show')->with([
            'post' => $post,
        ]);
    }

    public function new(){
        $tags = Tag::all();
        return view('posts.new')->with([
            'tags' => $tags
        ]);
    }

    public function create(PostRequest $request){
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        if ($request->file('img') != null){
            $image = $request->file('img')->store('public/images');
            $post->image = substr($image,14);
        }
        $post->save();
        $tag = $request->input('tag');
        $post->tags()->attach($tag);
        return redirect('/');
    }

    // public function edit(Post $post, Request $request){
    //     if($post->user_id === Auth::id()){
    //         $url = url('/users', $post->user_id);
    //         $tags = Tag::all();
    //         if(isset($_SERVER['HTTP_REFERER'])){
    //             $url = $_SERVER['HTTP_REFERER'];
    //         }
    //         return view('posts.edit')->with([
    //             'post' => $post,
    //             // 'page'=> $request->get('page'),
    //             'edit' => $request->post('edit'),
    //             'url' => $url,
    //             'tags' => $tags
    //         ]);
    //     }
    //     return redirect('/');
    // }

    public function update(PostRequest $request, Post $post){
        if($post->user_id === Auth::id()){
            $post->title = $request->title;
            $post->content = $request->content;
            if ($request->file('image') != null){
                $image = $request->file('image')->store('public/images');
                $post->image = substr($image,14);  
            }
    
            $post->save();
            // $page = $request->get('page');
            $user = Auth::id();

            $tag = $request->input('tag');
            $post->tags()->sync($tag);
            // if($request->edit === "1"){
            //     return redirect("/?page=$page");
            // }else if ($request->edit === "2"){
            //     return redirect("/users/$user?page=$page");
            // }
            // return redirect($request->url);
        }    
        return redirect()->back();    
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        if($post->user_id === Auth::id()){
            $post->delete();
            return redirect()->back();
        }
        return redirect('/');
        
    }

}
