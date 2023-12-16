<header>
 <div class="header_container">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
   <div class="container-fluid">
    <a href="{{ route('post.index') }}"><img src="{{ asset('logo/header_logo.png') }}" alt="ロゴ画像"></a>
    @include('commons.hamburger_menu')
   </div>
  </nav>
 </div>
</header>
@if(Auth::check())
<p class="login-user-name">
  ユーザー：<span>{{Auth::user()->name}}さん</span>
</p>
@endif
