@extends('layouts.default')

@section('title', '掲示板')

@section('content')
<div class="col-md-12">
  <h1>
    <a href="{{ action('UsersController@show', $user)}}" style="color:black">{{$post->user->name}}</a>
  </h1>

  <h3>タイトル</h3>
  <p>{{ $post->title }}</p>
  <h3>本文</h3>
  <p>{!! nl2br(e($post->content)) !!}</p>
  <img src="/storage/images/{{$post->image}}" width=60% height=60% class="post-image">
  <h3>タグ</h3>
  @foreach($post->tags as $tag)
    @if($tag === null)
      <p>この投稿にタグはありません</p>
    @else
      <p>{{ $tag->name }}</p>
    @endif
  @endforeach
</div>
@endsection