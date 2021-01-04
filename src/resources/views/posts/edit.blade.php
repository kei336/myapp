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