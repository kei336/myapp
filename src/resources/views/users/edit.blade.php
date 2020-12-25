@extends('layouts.default')

@section('title', 'ユーザー編集')

@section('content')
<div class="col-md-12">
  <h1>
    ユーザー編集
  </h1>
  
  <div class="field">
    <form method="post" action="{{ url('/users', $user->id) }}">
      {{ csrf_field() }}
      {{ method_field('patch')}}
      <label>名前</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
      @if ($errors->has('name'))
        <span class="error">{{ $errors->first('name') }}<br></span>
      @endif
      <label>メールアドレス</label>
      <input type="text" name="email" class="form-control" value="{{ old('email' ,$user->email) }}">
      @error('email')
        <span class="error">
            <strong>{{ $message }}<br></strong>
        </span>
      @enderror
      <div class="submit-btn">
        <input type="submit" class="btn btn-primary" value="更新">
      </div>
    </form>
  </div>
</div>
@endsection