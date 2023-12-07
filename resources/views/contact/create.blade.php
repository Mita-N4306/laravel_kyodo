@extends('layouts.app')
@section('content')
<div class="form_container">
 <div class="text_container">
   <h2>お問い合わせ</h2>
   <p>↓↓各フォームを入力後送信ボタンを押してください↓↓</p>
 </div>
 @include('commons.success_message')
  <form action="{{ route('contact.store')}}" method="post" >
  @csrf
  <div class="form_group">
   <label for="title">件名</label>
   <input type="text" id="title" name="title" value="{{ old('title') }}" required>
  </div>
  <div class="form_group">
   <label for="email">メールアドレス</label>
   <input type="text" id="email" name="email" value="{{ old('email') }}" required>
  </div>
  <div class="form_group">
    <label for="body">本文</label>
    <textarea name="body" id="body" cols="30" rows="10" required>{{ old('body') }}</textarea>
  </div>
  <div class="button_container">
     <button type="submit" class="btn btn-primary">送信</button>
  </div>
  </form>
</div>
@include('commons.return_back')
@endsection
