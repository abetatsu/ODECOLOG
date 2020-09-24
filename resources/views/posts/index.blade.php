@extends('layouts.app')

@section('content')
<a href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1600219018/%E8%A8%98%E4%BA%8B%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B31_1_itctd0.png" style="width:50px; height:50px;"></a>
<a href="{{ route('records.index') }}"><img src='https://res.cloudinary.com/tatsu/image/upload/v1600219026/%E3%82%AB%E3%83%AC%E3%83%B3%E3%83%80%E3%83%BC%E3%81%AE%E3%83%95%E3%83%AA%E3%83%BC%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B35_tutcob.png' style="width:50px; height:50px;"></a>
@foreach($posts as $post)
<div class="card col-sm-6 my-3 mx-auto">
     <a href="{{ route('posts.show', $post->id) }}">
          <h2>{{ $post->title }}</h2>
     </a>
     <a href="{{ route('users.show', $post->user->id) }}"><img src="{{ $post->user->image_path }}" alt="プロフィール画像" style="width:50px; height:50px;">{{ $post->user->name }}</a>
     {{ $post->created_at->diffForHumans(Carbon\Carbon::now()) }}
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