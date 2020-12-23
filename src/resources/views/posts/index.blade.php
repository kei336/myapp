@extends('layouts.default')

@section('title', '掲示板')

@section('content')


<div class="col-md-12">
  <h1>掲示板</h1>
  <a href="{{ url('/posts/new') }}">新規投稿</a>
  <a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
    <ul>
      @forelse($posts as $post)
      <div class="post-list">
        <a href="{{ action('PostsController@show', $post)}}"style="color:black;text-decoration: none;">タイトル：{{ $post->title }}</a>
        @if($user_id === $post->user_id)

          <div class="post-delete">
            <form method="post" action="{{ url('/posts/delete', $post->id)}}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" value="削除" class="btn btn-danger btn-sm">
            </form>
          </div>

          <div class="post-edit">
            <!-- <a href="{{ action('PostsController@edit', $post)}}"class="btn btn-primary btn-sm">編集</a> -->
            <form method="post" action="{{ url('/posts/edit', $post) }}">
            {{ csrf_field() }}
            <input type="hidden" name="page" value="{{$page}}">
            <!-- <input type="submit" value="編集" class="btn btn-primary btn-sm"> -->
            <input type="submit" value="編集" class="btn btn-primary btn-sm">
            <!-- <a type="submit" href="{{ url('/posts/edit', $post) }}" class="btn btn-primary btn-sm">編集</a>  -->
            </form>
          </div>
        @endif
      </div>
        @empty
        <li>投稿がありません</li>
      @endforelse
    </ul>
    {{ $posts->links() }}
</div>
@endsection