@extends('layouts.app')
@section('content')
<div class="top_container">
 <div class="top_container_area">
  <h1>Web開発 To Do list!!(仮)</h1>
 </div>
 @if(Auth::check())
 <div class="post-container" style="text-align:center; margin-bottom:12px;">
  <h2>投稿新規作成</h2>
  <p>↓↓投稿内容を入力後、投稿ボタンを押してください↓↓</p>
 @include('commons.success_message')
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
 </div>
 @endif
 <div class="search-container" style="text-align:center; margin-bottom:12px;">
  <h3>Web開発で分からないところはここで一発解決!(検索窓から検索してください)</h3>
 </div>
 @include('commons.carousel')
 <div class="posts-container">
    @if(isset($posts) && count($posts) > 0)
    @include('post.index')
  @else
    <p>No posts available.</p>
  @endif
 </div>
</div>
@endsection
