@extends('layouts.app')
@section('content')
 <div class="posts-list-container">
    {{ $user->name }}さん、こんにちは！
  <h1>過去の投稿一覧</h1>
  @foreach($posts as $post)
  <div class="title-container">
    <a href="{{ route('post.show',$post)}}">
        <p>件名：{{ $post->title }}</p>
    </a>
  </div>
  <div class="body-container">
   <p>投稿内容：{{ $post->body }}</p>
  </div>
  <div class="post-user-date">
    <p>{{ $post->user->name }}さん・{{ $post->created_at->diffForHumans() }}</p>
  </div>
  @endforeach
 </div>
@endsection
