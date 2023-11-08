@extends('layouts.app')
@section('content')
 <div class="comments-list-container">
  {{ auth()->user()->name }}さん、こんにちは！
  <h1>あなたの返信コメント一覧</h1>
  @include('commons.success_message')
  @if(count($comments)==0)
  <p>あなたはまだ返信コメントを投稿していません</p>
  @else
  @foreach($comments->unique('post_id') as $comment)
  @php
   $post=$comment->post;
  @endphp
  <div class="title-container">
   <a href="{{ route('post.show',$post) }}">
    <p>件名：{{ $post->title }}</p>
   </a>
  </div>
  <div class="body-container">
    <p>投稿内容：{{ Str::limit($post->body,100,'...') }}</p>
  </div>
  <div class="comment-badge-container">
   @if($post->comments->count())
   <span class="badge">
    コメント{{ $post->comments->count() }}件
   </span>
   @else
   <p>コメントはまだありません</p>
   @endif
   <a href="{{ route('post.show',$post) }}">
    <div class="button_coutainer">
     <button type="submit" class="btn btn-success">コメントする</button>
    </div>
   </a>
  </div>
  @endforeach
  @endif
 </div>
@endsection
