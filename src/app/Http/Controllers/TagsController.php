<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TagRequest;

class TagsController extends Controller
{

    public function index(){
        $tags = Tag::latest()->paginate(5);
        $user_id = Auth::id();
        return view('tags.index')->with([
            'tags' => $tags,
            'user_id' => $user_id,
        ]);
    }

    public function new(){
        return view('tags.new');
    }

    public function create(TagRequest $request){
  
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->user_id = Auth::id();
        $tag->save();
        return redirect('/tags');
    }

    public function edit(Tag $tag, Request $request){
        if($tag->user_id === Auth::id()){
            return view('tags.edit')->with([
                'tag' => $tag,
                'page'=> $request->get('page'),
            ]);
        }
        return redirect('/');
    }

    public function update(Tag $tag, TagRequest $request){
        $tag->name = $request->name;
        $tag->save();
        $page = $request->get('page');
        return redirect("/tags?page=$page");
    }

    public function destroy($id){
        $tags = Tag::findorFail($id);
        if($tags->user_id === Auth::id()){
            $tags->delete();
            return redirect('/tags');
        }
        return redirect('/tags');
    }


}