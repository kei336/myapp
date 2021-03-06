@extends('layouts.default')

@section('title', 'タグ編集')

@section('content')
<div class="col-md-12">
  <h1>
    タグ編集
  </h1>
  
  <div class="field">
    <!-- <form method="post" action="{{ url('/tags', $tag->id) }}">
      {{ csrf_field() }}
      {{ method_field('patch')}}
      <label>タグ名</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $tag->name) }}">
      @if ($errors->has('name'))
        <span clzass="error">{{ $errors->first('name') }}<br></span>
      @endif
      <input type="hidden" name="page" value="{{ $page }}">
      <div class="submit-btn">
        <input type="submit" class="btn btn-primary" value="更新">
      </div>
    </form> -->
    {{Form::open(['action' => ['TagsController@update', $tag->id] , 'method' => 'patch']) }}
      {{Form::label('タグ名')}}
      {{Form::text('name',$tag->name, ['class' => 'form-control'])}}
      @if ($errors->has('title'))
          <span class="error">{{ $errors->first('name') }}<br></span>
      @endif
      <div class="submit-btn">
        {{Form::submit('更新',['class' => 'btn btn-primary'])}}
      </div>
    {{Form::close()}}

  </div>
</div>
@endsection