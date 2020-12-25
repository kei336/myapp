<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
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

    public function index(){
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }

        //==============requestでやる
        $posts = Post::latest()->paginate(6);
        $user_id = Auth::id();
        // $posts = Post::orderBy('created_at', 'desc')->get();と同じ意味
        if(Auth::check()){
            return view('posts.index')->with([
                'posts' => $posts,
                'user_id' => $user_id,
                'page' => $page,
            ]);
        }else{
            return view('auth/login');
        }
        
    }

    public function show($id){
        $post = Post::findorFail($id);
   
        // データが見つからなかった場合例外を返す
        return view('posts.show')->with([
            'post' => $post,
        ]);
    }

    public function new(){
        return view('posts.new');
    }

    public function create(PostRequest $request){
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();
        return redirect('/');
    }

    public function edit(Post $post, Request $request){

        if($post->user_id === Auth::id()){
            return view('posts.edit')->with([
                'post' => $post,
                'page'=> $request->get('page'),
            ]);
        }else{
            return redirect('/');
        }
        
    }

    public function update(PostRequest $request, Post $post){
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        $page = $request->get('page');
        return redirect("/?page=$page");
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        if($post->user_id === Auth::id()){
            $post->delete();
            return redirect('/');
        }else{
            return redirect('/');
        }
        
    }

}
