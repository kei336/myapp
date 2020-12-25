@extends('layouts.default')

@section('title', '掲示板')

@section('content')
<div class="col-md-12">
  <h1>
    {{ $user->name }}
  </h1>
  @forelse($posts as $post)
      <div class="post-list">
        <a href="{{ action('PostsController@show', $post)}}"style="color:black;text-decoration: none;">タイトル：{{ $post->title }}</a>

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
      </div>
        @empty
        <li>投稿がありません</li>
      @endforelse
  


  
</div>
@endsection