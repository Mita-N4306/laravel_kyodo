@extends('layouts.app')
@section('content')
 <div class="mypost-name-container">
  <p>{{ auth()->user()->name }}さん、こんにちは！</p>
  <h1>あなたの投稿一覧</h1>
 </div>
  @include('commons.success_message')
  @if(count($posts) == 0)
  <p>あなたはまだ投稿していません</p>
  @else
  @foreach($posts as $post)
 <div class="mypost-container">
  <div class="title-container">
    <a href="{{ route('post.show',$post) }}">
     <p>件名：{{ $post->title }}</p>
    </a>
  </div>
  <div class="body-container">
   <p>投稿内容：{{ Str::limit($post->body,100,'...') }}</p>
  </div>
  <div class="post-user-date">
    <p>{{ $post->user->name }}さん・{{ $post->created_at->diffForHumans() }}</p>
  </div>
  <div class="comment-badge-container">
    @if($post->comments->count())
    <span class="badge">
     コメント{{ $post->comments->count() }}件
    </span>
    @else
    <span>コメントはまだありません</span>
    @endif
  </div>
    <a href="{{ route('post.show',$post)}}">
     <div class="button_container">
      <button type="submit" class="btn btn-success">コメントする</button>
     </div>
    </a>
  </div>
  @endforeach
  @endif
  <div class="mycomment-link">
   <a href="{{ route('post.mycomment')}}">あなたの返信コメントはこちら</a>
  </div>
  @include('commons.return_back')
@endsection
