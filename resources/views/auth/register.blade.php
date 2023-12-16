@extends('layouts.app')
@section('content')
<div class="form_container">
 <div class="register-top-container">
  <h1>--REGISTER--</h1>
  <img src="{{ asset('img/register.jpg') }}" alt="新規登録画像">
  <p>新規登録を行うと、コメント欄を利用できたり、あなたの登録したコメント一覧を閲覧することができます。</p>
 </div>
 <div class="text_container">
   <div class="exposition-container">
    <h2>新規会員登録</h2>
    <p>↓↓登録は以下を入力後、新規登録ボタンを押してください↓↓</p>
   </div>
    <form action="{{ route('signup.post') }}" method="POST">
    @csrf
    <div class="form_group">
     <label for="name">名前</label>
     <input type="text" id="name" name="name" class="form_control" value="{{ old('name') }}">
    </div>
    <div class="form_group">
      <label for="email">メールアドレス</label>
      <input type="text" id="email" name="email" class="form_control" value="{{ old('email') }}">
    </div>
    <div class="form_group">
       <label for="password">パスワード</label>
       <input type="password" id="password" name="password" class="form_control" value="{{ old('password')}}">
    </div>
    <div class="form_group">
       <label for="password_confirmation">パスワード確認</label>
       <input type="password" id="password_confirmation" name="password_confirmation" class="form_control" value="{{ old('password_confirmation') }}">
    </div>
    <div class="button_container">
     <button type="submit" class="btn btn-primary">新規登録</button>
    </div>
    </form>
 </div>
 @include('commons.return_back')
</div>
@endsection
