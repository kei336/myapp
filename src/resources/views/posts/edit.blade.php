@extends('layouts.default')

@section('title', '投稿編集')

@section('content')
<div class="col-md-12">
  <h1>
    編集
  </h1>
  
  <div class="field">
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
      <input type="file" name="img">
      <br>
      <label>タグ</label><br>
      @foreach($tags as $tag)
        <input type="checkbox" name="tag[]" value="{{$tag->id}}" ><label>{{$tag->name}}</label>
      @endforeach
      <input type="hidden" name="url" value="{{ $url }}">
      <div class="submit-btn">
        <input type="submit" class="btn btn-primary" value="更新">
      </div>
    </form>
  </div>
</div>
@endsection
     <!-- {{Form::open(['action' => 'PostsController@create','method' => 'post','files' => true])}}
      {{Form::label('タイトル')}}
      {{Form::text('title', ['class' => 'form-control'])}}
      @if ($errors->has('title'))
          <span class="error">{{ $errors->first('title') }}<br></span>
      @endif
      {{Form::label('本文')}}
      {{Form::textarea('content', ['class' => 'form-control'])}}
      @if ($errors->has('content'))
          <span class="error">{{ $errors->first('content') }}</span>
      @endif
      {{Form::label('画像')}}
      <br>
      @if ($post->image != null)
        <img id="gazou" src="/storage/images/{{$modal->image}}" width=30% height=30%>
      @else
        <p id="gazou">画像はありません</p>
      @endif
      <div class="post-edit-image">
          <img id="preview" width=30% height=30%>
      </div>
      {{Form::file('img',['name' => "image", 'id' => "img", 'accept' => 'image/*'])}}
      <br>
      {{Form::label('タグ')}}
      <br>
      @foreach($tags as $tag)
      {{Form::checkbox('tag[]',$tag->id)}}{{Form::label($tag->name)}}
      @endforeach
      <div class="submit-btn">
        {{Form::submit('更新',['class' => 'btn btn-primary'])}}
      </div>
      {{Form::close()}} -->