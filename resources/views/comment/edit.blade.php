@extends('layouts.app')
@section('content')
<div class="text_container">
 <h2>コメントの編集</h2>
 <p>↓↓コメント内容を編集後、更新ボタンを押してください↓↓</p>
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
    {{-- 以前の画像が存在する場合、削除ボタンを表示 --}}
    @if($comment->image)
     <div class="body-container">
      <label for="">既存の画像を削除</label>
      <input type="checkbox" name="delete_image" value="1">
     </div>
    @endif
   <div class="button_container">
    <button type="submit" class="btn btn-primary">コメントを更新する</button>
   </div>
  </div>
 </form>
</div>
@endsection
