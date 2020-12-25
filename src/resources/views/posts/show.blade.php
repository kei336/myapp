@extends('layouts.default')

@section('title', '掲示板')

@section('content')
<div class="col-md-12">
  <h1>
    <a href="{{ action('UsersController@show', $user)}}" style="color:black">{{ $user->name }}</a>
  </h1>

  <h3>タイトル</h3>
  <p>{{ $post->title }}</p>
  <h3>本文</h3>
  <p>{!! nl2br(e($post->content)) !!}</p>
</div>
@endsection