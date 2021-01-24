@extends('layouts.default')

@section('title', 'ユーザー一覧')

@section('content')


<div class="col-md-12">
  <h1>ユーザー一覧</h1>
  {!! Form::open(['action' => 'UsersController@index', 'method' => 'get']) !!}
    <div class="form-group">
        {!! Form::label('text', 'ユーザ名:') !!}
        {!! Form::text('name' ,'', ['class' => 'form-control', 'placeholder' => '検索したいユーザー名を入力'] ) !!}
    </div>
        {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
    <ul>
      @forelse($data as $user)
      <div class="post-list">
        <div class="post-name">
          <a href="{{ action('UsersController@show', $user)}}" style="color:black;" >
            {{$user->name}}
          </a>
        </div>
        <br>
      </div>
        @empty
        <li>投稿がありません</li>
      @endforelse
    </ul>
</div>
@endsection