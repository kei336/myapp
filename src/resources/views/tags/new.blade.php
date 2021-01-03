@extends('layouts.default')

@section('title', 'タグ登録')

@section('content')
<div class="col-md-12">
  <h1>
    タグ登録
  </h1>
  <div class="field">
    <form method="post" action="{{ url('/tags') }}">
      {{ csrf_field() }}
      <label>タグ名</label>
      <input type="text" name="name" class="form-control" placeholder="タグの名前を入力">
      @if ($errors->has('name'))
        <span clzass="error">{{ $errors->first('name') }}<br></span>
      @endif
      <div class="submit-btn">
        <input type="submit" class="btn btn-primary" value="登録">
      </div>
    </form>
  </div>
</div>
@endsection