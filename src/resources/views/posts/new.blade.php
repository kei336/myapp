@extends('layouts.default')

@section('title', '新規投稿')

@section('content')
<div class="col-md-12">
  <h1>
    新規投稿
  </h1>
  <div class="field">
    <!-- <form method="post" action="{{ url('/posts') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <label>タイトル</label>
      <input type="text" name="title" class="form-control" placeholder="タイトルを入力">
      @if ($errors->has('title'))
        <span class="error">{{ $errors->first('title') }}<br></span>
      @endif

      <br>
      <label>本文</label>
      <textarea name="content" class="form-control" rows="10" placeholder="投稿したい内容を入力"></textarea>
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
      <div class="submit-btn">
        <input type="submit" class="btn btn-primary" value="投稿">
      </div>
    </form> -->
    {{Form::open(['action' => 'PostsController@create' , 'method' => 'post' , 'files' => true ]) }}
    {{Form::label('タイトル')}}
    {{Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'タイトルを入力'])}}
    @if ($errors->has('title'))
        <span class="error">{{ $errors->first('title') }}<br></span>
    @endif
    {{Form::label('本文')}}
    {{Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => '投稿したい内容を入力'])}}
    @if ($errors->has('content'))
        <span class="error">{{ $errors->first('content') }}</span>
    @endif
    {{Form::label('画像')}}
    {{Form::file('img')}}
    <br>
    {{Form::label('タグ')}}
    <br>
    @foreach($tags as $tag)
    {{Form::checkbox('tag[]',$tag->id)}}{{Form::label($tag->name)}}
    @endforeach
    <div class="submit-btn">
      {{Form::submit('投稿',['class' => 'btn btn-primary'])}}
    </div>
    {{Form::close()}}
  </div>
</div>
@endsection