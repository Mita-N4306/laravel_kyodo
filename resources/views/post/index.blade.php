{{-- @extends('layouts.app')
@section('content')
 <div class="posts-list-container">
    {{ $user->name }}さん、こんにちは！
  <h1>過去の投稿一覧</h1>
  @include('commons.success_message') --}}
  @foreach($posts as $post)
  <div class="title-container">
    <a href="{{ route('post.show',$post)}}">
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
    <a href="{{ route('post.show',$post)}}">
     <div class="button_container">
      <button type="submit" class="btn btn-success">コメントする</button>
     </div>
    </a>
   </div>
  @endforeach
  {{ $posts->links("pagination::bootstrap-4") }}
 {{-- </div>
@endsection --}}
