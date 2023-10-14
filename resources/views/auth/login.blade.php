@extends('layouts.app')
@section('content')
<div class="form_container">
    <div class="form_top_container">
       <h1>Web開発 To Do List!!(仮)</h1>
       <p>ログインを行うと、コメント欄を利用できたり、あなたの登録したコメント一覧を閲覧することができます。</p>
    </div>
    <div class="text_container">
       <h2>ログイン</h2>
       <p>↓↓ログインするとコメント欄に文字を入力することができます↓↓</p>
       <form action="{{ route('login.post') }}" method="POST">
       @csrf
       <div class="form_group">
         <label for="email">メールアドレス</label>
         <input type="text" id="email" name="email" class="form_control" value="{{ old('email') }}">
       </div>
       <div class="form_group">
          <label for="password">パスワード</label>
          <input type="password" id="password" name="password" class="form_control" value="{{ old('password') }}">
       </div>
       <div class="button_container">
        <button type="submit" class="btn btn-primary">ログイン</button>
       </div>
       </form>
       <div class="new-register">
        <a href="{{ route('signup')}}">新規登録はこちら</a>
       </div>
    </div>
   </div>
   @endsection

