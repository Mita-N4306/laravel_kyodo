<header>
 <div class="header_container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="{{asset('logo/header_logo.png')}}" alt="ロゴ画像"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('signup') }}">新規会員登録</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page"href="#">ログイン</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
 </div>
</header>
