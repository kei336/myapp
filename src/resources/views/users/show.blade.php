@extends('layouts.default')

@section('title', '掲示板')

@section('content')
<div id="edit"></div>
<div class="col-md-12">

  <h1>
    {{$user_name}}
  </h1>
 <ul>
  @forelse($posts as $post)
 
    <div class="post-list">
      @if ($post->image != null)
          <a href="{{ action('PostsController@show', $post)}}"style="color:black;text-decoration: none;" class="post-title">
            <img src="/storage/images/{{$post->image}}" width=50% height=50% class="post-image">
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
          <!-- <form method="post" action="{{ url('/posts/edit', $post) }}">
            {{ csrf_field() }}
            <input type="submit" value="編集" class="btn btn-primary btn-sm">
          </form> -->
          <div id="open{{$post->id}}">
            <!-- <p class="btn btn-primary btn-sm">edit</p> -->
            <!-- <button class="btn btn-primary btn-sm">編集</button> -->
            <a href="#edit" class="btn btn-primary btn-sm">編集</a>
          </div>
              <div id="mask" class="hidden"></div>
           
                <section id="modal{{$post->id}}" class="hidden">
                  <span id="modal">
                <form method="post" action="{{ url('/posts', $post->id) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('patch')}}
                  <label>タイトル</label>
                  <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
                  @if ($errors->has('title'))
                    <span class="error">{{ $errors->first('title') }}<br></span>
                  @endif
                  <label>本文</label>
                  <textarea name="content" class="form-control" rows="10">{{ old('content', $post->content) }}</textarea>
                  @if ($errors->has('content'))
                    <span class="error">{{ $errors->first('content') }}</span>
                  @endif
                  <br>
                  <label>画像</label><br>
                  @if ($post->image != null)
                    <img id="gazou{{$post->id}}" src="/storage/images/{{$post->image}}" width=30% height=30%>
                  @else
                    <p id="gazou{{$post->id}}">画像はありません</p>
                  @endif
                  <img id="preview{{$post->id}}" width=30% height=30%>
                  <input id="image{{$post->id}}" name="img" type="file" accept="image/*">
                  

                  <br>
                  <label>タグ</label><br>
                  @foreach($tags as $tag)
                    <input type="checkbox" name="tag[]" value="{{$tag->id}}" ><label>{{$tag->name}}</label>
                  @endforeach
                  <div class="submit-btn">
                    <input type="submit" class="btn btn-primary" value="更新">
                  </div>
                </form>
                </span>
              </section>
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