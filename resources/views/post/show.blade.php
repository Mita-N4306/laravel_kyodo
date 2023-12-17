@extends('layouts.app')
@section('content')
<div class="Individual-container">
 <h2>投稿の個別表示</h2>
</div>
@include('commons.success_message')
 <div class="show-post-container">
  <p>{{ $post->title }}</p>
  <p>{!! nl2br(e($post->body)) !!}</p>
 @if($post->image)
 <div class="body-container">
  <img src="{{ asset('storage/images/'.$post->image)}}" alt="投稿画像">
  <p>(画像ファイル：{{ $post->image }})</p>
 </div>
 @endif
  <div class="name-display-container">
   <p> {{ $post->user->name }}さん • {{$post->created_at->diffForHumans()}}</p>
  </div>
 @if(Auth::id() === $post->user_id)
  <a href="{{ route('post.edit',$post) }}">
  <div class="button-comprehensive">
   <div class="edit-button-container">
    <button type="button" class="btn btn-success">編集</button>
   </div>
  </a>
  <form action="{{ route('post.destroy',$post) }}" method="post">
  @csrf
  @method('delete')
   <div class="edit-button-container">
    <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？');" >削除</button>
   </div>
  </form>
  </div>
 @endif
</div>
{{-- コメントの表示 --}}
@foreach($post->comments as $comment)
<div class="show-comment-container">
 {!! nl2br(e($comment->body)) !!}
 @if($comment->image)
 <div class="body-container">
   <img src="{{ asset('storage/images/' .$comment->image) }}" alt="投稿画像">
   <p>(画像ファイル:{{ $comment->image }})</p>
 </div>
 @endif
 <div class="text-sm font-semibold flex flex-row-reverse">
  <p>{{ $comment->user->name}}さん・{{$comment->created_at->diffForHumans()}}</p>
 </div>
 @if(Auth::id() === $comment->user_id)
 <a href="{{ route('comment.edit', $comment)}}">
 <div class="button-comprehensive">
  <div class="edit-button-container">
    <button type="button" class="btn btn-success">コメントの編集</button>
  </div>
 </a>
 <form action="{{ route('comment.destroy',$comment->id) }}" method="post">
 @csrf
 @method('DELETE')
  <div class="button_container">
   <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？');">コメントを削除する</button>
  </div>
 </form>
 </div>
 @endif
</div>
@endforeach
{{-- コメントの表示ここまで --}}
{{-- コメント機能追加 --}}
@if(Auth::id())
<div class="comment-container">
 <form action="{{ route('comment.store') }}" method='post' enctype="multipart/form-data">
  @csrf
  <div class="form_group">
    <input type="hidden" name='post_id' value="{{ $post->id }}">
    <textarea class="post-content" name="body" id="body" cols="30" rows="10" required placeholder="コメントを入力してください">{{old('body')}}</textarea>
  </div>
  <div class="form_group">
    <label for="image">画像を入れる</label>
    <input type="file" id="image" name="image">
  </div>
  <div class="button_container">
   <button type="submit" class="btn btn-success">コメントする</button>
  </div>
 </form>
 @endif
</div>
{{-- コメント機能追加ここまで --}}
@include('commons.return_back')
@endsection
