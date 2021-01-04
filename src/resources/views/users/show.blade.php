@extends('layouts.default')

@section('title', '掲示板')

@section('content')
<div class="col-md-12">
  <h1>
    {{$user_name}}
  </h1>
 
  @forelse($posts as $post)
 
    <div class="post-list">
      @if ($post->image != null)
          <a href="{{ action('PostsController@show', $post)}}"style="color:black;text-decoration: none;" class="post-title">
            <img src="/storage/images/{{$post->image}}" width=60% height=60% class="post-image">
          </a>
      @endif
      <br>
      <a href="{{ action('PostsController@show', $post)}}"style="color:black;text-decoration: none;">タイトル：{{ $post->title }}</a>
      @if($user->id === $post->user_id)
        <div class="post-delete">
          <form method="post" action="{{ url('/posts/delete', $post->id)}}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" value="削除" class="btn btn-danger btn-sm">
          </form>
        </div>
        <div class="post-edit">
          <form method="post" action="{{ url('/posts/edit', $post) }}">
            {{ csrf_field() }}
            <input type="submit" value="編集" class="btn btn-primary btn-sm">
          </form>
        </div>
      @endif
      </div>
  @empty
    <li>投稿がありません</li>
  @endforelse
  {{ $posts->links() }}
  </div>
@endsection