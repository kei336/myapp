@extends('layouts.default')

@section('title', 'タグ一覧')

@section('content')


<div class="col-md-12">
  <h1>タグ一覧</h1>
    <ul>
      @forelse($tags as $tag)
      <div class="post-list">
        {{ $tag->name }}
        @if($user_id === $tag->user_id)

          <div class="post-delete">
            <!-- <form method="post" action="{{ url('/tags/delete', $tag->id)}}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" value="削除" class="btn btn-danger btn-sm">
            </form> -->
            {{ Form::open(['action' => ['TagsController@destroy',$tag->id],  'method' => 'delete']) }}
            {{ Form::submit('削除',['class' => "btn btn-danger btn-sm"]) }}
            {{ Form::close() }}

          </div>

          <div class="post-edit">
            <form method="post" action="{{ url('/tags/edit', $tag) }}">
            {{ csrf_field() }}
            <input type="submit" value="編集" class="btn btn-primary btn-sm">
            </form>
          </div>
        @endif
      </div>
      @empty
        <li>タグがありません</li>
      @endforelse
    </ul>
    {{ $tags->links() }}
</div>
@endsection