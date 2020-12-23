@extends('layouts.default')

@section('title', 'ユーザー登録')

@section('content')
<div class="col-md-12">
  <h1>
  　ユーザー登録
    <a href="{{ url('/') }}" class="back">Back</a>
  </h1>
  <div class="field">
    <form method="post" action="{{ url('/users') }}">
      {{ csrf_field() }}
      <label>名前</label>
      <input type="text" name="name" class="form-control" placeholder="名前を入力">
 
      <label>メールアドレス</label>
      <input type="text" name="email" class="form-control" placeholder="メールアドレスを入力">

      <lavel>パスワード</label>
      <input type="password" name="password" class="form-control" placeholder="パスワードを入力(6文字以上)">
  
      <div class="submit-btn">
        <input type="submit" class="btn btn-primary" value="投稿">
      </div>
    </form>
  </div>
</div>
@endsection