@extends('layouts.app')
@section('content')
<div class="text_container">
 <div class="commentedit-container">
  <h1>--COMMENT EDIT--</h1>
  <img src="{{ asset('img/comment_edit.png')}}" alt="返信コメント編集画像">
 </div>
 <div class="exposition-container">
  <h2>コメントの編集</h2>
  <p>↓↓コメント内容を編集後、更新ボタンを押してください↓↓</p>
 </div>
 <form action="{{ route( 'comment.update',$comment->id )}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form_group">
   <textarea name="body" id="body" cols="30" rows="10" required>{{ old('body',$comment->body) }}</textarea>
   <!-- 画像を表示 -->
   @if($comment->image)
   <div class="body-container">
       <img src="{{ asset('storage/images/'.$comment->image) }}" alt="投稿画像">
       <p>(画像ファイル:{{ $comment->image }})</p>
   </div>
   @endif
   <label for="image">違う画像に入れ替える</label>
    <input type="file" id="image" name="image">
   <div class="button_container">
    <button type="submit" class="btn btn-primary">コメントを更新する</button>
   </div>
  </div>
 </form>
</div>
@include('commons.show_comment_back')
@endsection
