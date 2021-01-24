<header class="navbar navbar-fixed-top navbar-default">
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  
  <div class="main-logo">
    <a href="{{ url('/') }}" style="color:black;text-decoration: none;">Myapp</a>
  </div>
</div>

  <div class="collapse navbar-collapse" id="navbar">
    <ul class="nav navbar-nav">
    @if(Auth::check())
      <li><a href="{{ url('/posts/new') }}">新規投稿</a></li>
      <li><a href="{{url('/users')}}">ユーザー一覧</a></li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          {{ $user->name }}<b class="caset"></b>
          </a>
        <ul class="dropdown-menu">
          <li>
            <a href="{{ action('UsersController@show', $user)}}">マイページ</a>
          </li>
          <li>
            <a href="{{ action('UsersController@edit', $user)}}">ユーザー編集</a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('ログアウト') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          タグ<b class="caset"></b>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="{{ url('/tags/new') }}">タグ登録</a>
          </li>
          <li>
            <a href="{{ url('/tags') }}">タグ一覧</a>
          </li>
        </ul>
      </li>
    @else
      <li>
        <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>
      </li>
      <li>
        <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
      </li>
    @endif

    </ul>
  </div>
</header>