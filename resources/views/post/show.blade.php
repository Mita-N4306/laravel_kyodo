@extends('layouts.app')
@section('content')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    投稿の個別表示
</h2>
@include('commons.success_message')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="mx-4 sm:p-8">
    <div class="px-10 mt-4">
        <div class="bg-white w-full  rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
            <div class="mt-4">
                <h4 class="text-lg text-gray-700 font-semibold">
                    {{ $post->title }}
                     <a href="{{ route('post.edit',$post) }}">
                     <div class="edit-button-container">
                      <button type="button" class="btn btn-success">編集</button>
                     </div>
                     </a>
                <form action="{{ route('post.destroy',$post) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？');" >削除</button>
                </form>
                </h4>
                <hr class="w-full">
                <p class="mt-4 text-gray-600 py-4 whitespace-pre-line">{{$post->body}}</p>
                @if($post->image)
                <div class="body-container">
                 <img src="{{ asset('storage/images/'.$post->image)}}" alt="投稿画像">
                 <p>(画像ファイル：{{ $post->image}})</p>
                </div>
                @endif
                <div class="text-sm font-semibold flex flex-row-reverse">
                    <p> {{ $post->user->name }}さん • {{$post->created_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('commons.return_back')
@endsection
