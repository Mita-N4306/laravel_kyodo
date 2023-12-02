@extends('layouts.app')
@section('content')
<div class="text_container">
 <h2>コメントの編集</h2>
 <p>↓↓コメント内容を編集後、更新ボタンを押してください↓↓</p>
 <form action="{{ route( 'comment.update',$comment->id )}}" method="post">
  @csrf
  @method('PUT')
  <div class="form_group">
   <textarea name="body" id="body" cols="30" rows="10" required>{{ old('body',$comment->body) }}</textarea>
   <div class="button_container">
    <button type="submit" class="btn btn-primary">コメントを更新する</button>
   </div>
  </div>
 </form>
</div>
@endsection
