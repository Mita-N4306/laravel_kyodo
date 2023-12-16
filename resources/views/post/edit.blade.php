@extends('layouts.app')
@section('content')
<div class="form_container">
    <div class="postedit-container">
      <h1>--POST EDIT--</h1>
      <img src="{{ asset('img/post_edit.jpg') }}" alt="投稿編集画面">
      <p>投稿を更新したい場合はここですることができます。</p>
    </div>
    <div class="text_container">
     <div class="exposition-container">
      <h2>投稿の編集</h2>
      <p>↓↓投稿内容を編集後、更新ボタンを押してください↓↓</p>
     </div>
     <form action="{{ route('post.update',$post)}}" method="POST" enctype="multipart/form-data">
     @csrf
     @method('put')
     <div class="form_group">
      <label for="title">件名</label>
      <input type="text" id="title" name="title" required value="{{ old('title',$post->title) }}" >
     </div>
     <div class="form_group">
      <label for="body">本文</label>
      <textarea name="body" id="body" cols="30" rows="10" required>{{ old('body',$post->body) }}</textarea>
     </div>
     <div class="form_group">
     @if($post->image)
     <div class="body-container">
      <img src="{{ asset('storage/images/'.$post->image) }}" alt="投稿画像">
      <p>(画像ファイル:{{ $post->image }})</p>
     </div>
     @endif
     <label for="">画像を入れる</label>
     <input type="file" id="image" name="image">
   </div>
   <div class="button_container">
    <button type="submit" class="btn btn-primary">記事を更新する</button>
   </div>
   </form>
</div>
@include('commons.show_back')
@endsection
