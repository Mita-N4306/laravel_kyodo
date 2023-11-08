<header>
 <div class="header_container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('top') }}"><img src="{{ asset('logo/header_logo.png') }}" alt="ロゴ画像"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
             @if(Auth::check())
             <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">ログアウト</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('post.mypost') }}">あなたの投稿一覧</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('post.mycomment') }}">あなたの返信コメント一覧</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('post.index') }}">過去の投稿一覧</a>
              </li>
             @else
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('signup') }}">新規会員登録</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('login') }}">ログイン</a>
              </li>
            </ul>
             @endif
          </div>
        </div>
    </nav>
 </div>
</header>
@if(Auth::check())
<p class="login-user-name">
  ユーザー：<span>{{Auth::user()->name}}さん</span>
</p>
@endif
