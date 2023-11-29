@extends('layouts.app')
@section('content')
<div class="text_container">
 <h2>投稿の編集</h2>
 <p>↓↓投稿内容を編集後、更新ボタンを押してください↓↓</p>
 <form action="{{ route( 'comment.update',$comment->id )}}" method="post">
  @csrf
  @method('PUT')
  <textarea name="body" id="body" cols="30" rows="10">{{ old('body',$comment->body) }}</textarea>
  <div class="button_container">
   <button type="submit" class="btn btn-primary">コメントを更新する</button>
  </div>
 </form>
</div>
@endsection
