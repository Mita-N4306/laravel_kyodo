<div class="navbar">
 <div class="hamburger-menu" onClick="toggleMenu()">
  <div class="bar"></div>
  <div class="bar"></div>
  <div class="bar"></div>
 </div>
 <ul class="menu">
  @if(Auth::check())
  <li>
    <a href="{{ route('logout') }}">ログアウト</a>
  </li>
  <li>
    <a href="{{ route('post.mypost')}}">あなたの投稿一覧</a>
  </li>
  <li>
    <a href="{{ route('post.mycomment')}}">あなたの返信コメント</a>
  </li>
  @can('admin')
  <li>
    <a href="{{ route('profile.index') }}">ユーザー一覧</a>
  </li>
  @endcan
  @else
  <li>
    <a href="{{ route('signup')}}">新規会員登録</a>
  </li>
  <li>
    <a href="{{ route('login')}}">ログイン</a>
 </li>
  <li>
    <a href="{{ route('contact.create')}}">お問い合わせ</a>
 </li>
  @endif
 </ul>
 {{-- javascriptのコード --}}
 <script>
  function toggleMenu() {
  var menu = document.querySelector('.menu');
  menu.classList.toggle('show');
  }
 </script>
</div>

