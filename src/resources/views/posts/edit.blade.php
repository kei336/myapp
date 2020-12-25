@extends('layouts.default')

@section('title', '投稿編集')

@section('content')
<div class="col-md-12">
  <h1>
    編集
  </h1>
  
  <div class="field">
    <form method="post" action="{{ url('/posts', $post->id) }}">
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
      <input type="hidden" name="page" value="{{ $page }}">
      <div class="submit-btn">
        <input type="submit" class="btn btn-primary" value="更新">
      </div>
    </form>
  </div>
</div>
@endsection