@extends('layouts.default')

@section('title', '掲示板')

@section('content')

<div class="col-md-12">
    <div class="filed">
        <h1>ログイン</h1>
        <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email">{{ __('メールアドレス') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="error">
            <strong>{{ $message }}<br></strong>
        </span>
        @enderror
        <label for="password">{{ __('パスワード') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
        <span class="error">
            <strong>{{ $message }}<br></strong>
        </span>
        @enderror
        <!-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label> -->
        <div class="submit-btn">
            <button type="submit" class="btn btn-primary">
                {{ __('ログイン') }}
            </button>
        </div>
        <!-- @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('パスワードを忘れた方') }}
            </a>
        @endif -->
        </form>
        <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>
    </div>
</div>

@endsection
