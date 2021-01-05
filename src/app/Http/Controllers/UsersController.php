<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

  public function show(User $user, Request $request){
    // $page = 1;
    // if (isset($request->page)){
    //   $page = $request->page;
    // }
    $user = User::findorFail($user->id);
    $posts = Post::where('user_id', $user->id)->latest()->paginate(6);
    $user_name = $user->name;
    $tags = Tag::all();
    return view('users.show')->with([
      'user'=> $user,
      'posts' => $posts,
      // 'page' => $page,''
      'user_name' => $user_name,
      'tags' => $tags,
      ]);
  }

  public function edit(User $user){
    if($user->id === Auth::id()){
        return view('users.edit');
    }
    return redirect('/');
  }

  public function update(User $user,Request $request){
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();
    return redirect('/');
  }
}
