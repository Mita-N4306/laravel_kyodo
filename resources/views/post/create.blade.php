@extends('layouts.app')
@section('content')
<div class="form_container">
  <div class="form_top_container">
    <h1>Web開発 To Do List!!(仮)</h1>
    <p>過去にエラーが起こった問題点を投稿できます。</p>
  </div>
  <div class="text_container">
    <h2>投稿新規作成</h2>
    <p>↓↓投稿内容を入力後、投稿ボタンを押してください↓↓</p>
    @if(session('message'))
     <div class="message-container" style="text-align:center; padding:8px; border:solid 2px green; background-color:lightgreen">
      {{session('message')}}
     </div>
    @endif
 <form action="{{ route('post.store')}}" method="POST" enctype="multipart/form-data">
 @csrf
 <div class="form_group">
  <label for="title">件名</label>
  <input type="text" id="title" name="title" required value="{{ old('title') }}" >
 </div>
 <div class="form_group">
   <label for="body">本文</label>
   <textarea name="body" id="body" cols="30" rows="10" required>{{ old('body') }}</textarea>
 </div>
 <div class="form_group">
  <label for="">画像を入れる</label>
  <input type="file" id="image" name="image">
 </div>
 <div class="button_container">
  <button type="submit" class="btn btn-primary">記事を投稿する</button>
 </div>
 </form>
</div>
@endsection
