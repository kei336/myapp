<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

  public function show(User $user){
    $user = User::findorFail($user->id);
    $posts = Post::where('user_id', $user->id)->paginate(10);
    return view('users.show')->with([
      'user'=> $user,
      'posts' => $posts
      ]);
  }

  public function edit(User $user){
      if($user->id === Auth::id()){
        return view('users.edit');
    }else{
        return redirect('/');
    }
  }

  public function update(User $user,Request $request){
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();
    return redirect('/');
  }
}
