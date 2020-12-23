@extends('layouts.default')

@section('title', '掲示板')

@section('content')
<div class="col-md-12">
  <h1>
    掲示板
    <a href="{{ url('/') }}" class="back">Back</a>
  </h1>
  <a href="{{ url('/posts/new') }}">新規投稿</a>
  <h3>タイトル</h3>
  <p>{{ $post->title }}</p>
  <h3>本文</h3>
  <p>{!! nl2br(e($post->content)) !!}</p>
</div>
@endsection