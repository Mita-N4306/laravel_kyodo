@extends('layouts.app')
@section('content')
<div class="top_container">
 <div class="top_container_area">
 <h1>Web開発 To Do list!!(仮)</h1>
 </div>
 @if(Auth::check())
 <div class="post-container" style="text-align:center; margin-bottom:12px;">
  <h3>↓記事の投稿はこちら↓</h3>
  <a href="{{ route('post.create') }}">
   <button type="submit" class="btn btn-primary" style="margin-bottom:16px;">記事を投稿する</button>
  </a>
 </div>
 @endif
 <div class="search-container" style="text-align:center; margin-bottom:12px;">
  <h3>Web開発で分からないところはここで一発解決!(検索窓から検索してください)</h3>
 </div>
 @include('commons.carousel')
</div>
@endsection
