@extends('layouts.default')

@section('content')

<div class="col-md-12">
    <h1>新規登録</h1>
    <div class="field">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label for="name">{{ __('名前') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="error">
                <strong>{{ $message }}<br></strong>
            </span>
            @enderror
            <label for="email" >{{ __('メールアドレス') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="error">
                <strong>{{ $message }}<br></strong>
            </span>
            @enderror
            <label for="password">{{ __('パスワード(8文字以上)') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
            <span class="error">
                <strong>{{ $message }}<br></strong>
            </span>
            @enderror

            <label for="password-confirm">{{ __('パスワード(確認用)') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <div class="submit-btn">
                <button type="submit" class="btn btn-primary">
                    {{ __('登録') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
