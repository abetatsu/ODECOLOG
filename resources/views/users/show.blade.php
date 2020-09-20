@extends('layouts.app')

@section('content')
<a href="{{ route('posts.index') }}">投稿一覧ページに戻る</a>
<div class="card col-md-6 mx-auto my-3">
     <div class="row">
          <div class="card-body col-md-5">
               <img src="{{ $user->image_path }}" alt="画像" style="width:200px; height:200px;">
          </div>
          <div class="card-body col-md-5">
               <h2 class="d-inline-block">{{ $user->name }}</h2>
               <p>投稿数：{{ $user->posts->count() }}</p>
               <p>年齢：{{ $user->age }}</p>
               <p>職業：{{ $user->job }}</p>
               @if($user->id === Auth::id())
               <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">編集</a>
               @endif
          </div>
     </div>
</div>
<h2 class="text-center">投稿一覧</h2>
<hr>
@foreach($posts as $post)
<div class="card col-sm-6 my-3 mx-auto">
     <a href="{{ route('posts.show', $post->id) }}">
          <h2>{{ $post->title }}</h2>
     </a>
     <a href="{{ route('users.show', $post->user->id) }}"><img src="{{ $post->user->image_path }}" alt="プロフィール画像" style="width:50px; height:50px;">{{ $post->user->name }}</a>
     {{ $post->updated_at->format('Y/m/d H:i:s') }}
     <div class="card-body">
          <p class="card-text">{{ $post->content }}</p>
     </div>
     <img src="{{ $post->image_path }}" alt="画像" style="width:200px; height:200px;" class="mx-auto">
     <like-component
          :post="{{ json_encode($post) }}"
     ></like-component>
     <dislike-component
          :post="{{ json_encode($post) }}"
     ></dislike-component>
</div>
@endforeach
@endsection