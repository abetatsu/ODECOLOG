@extends('layouts.app')

@section('content')
@foreach($posts as $post)
<a href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1600219018/%E8%A8%98%E4%BA%8B%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B31_1_itctd0.png" style="width:50px; height:50px;"></a>
<a href="{{ route('records.index') }}"><img src='https://res.cloudinary.com/tatsu/image/upload/v1600219026/%E3%82%AB%E3%83%AC%E3%83%B3%E3%83%80%E3%83%BC%E3%81%AE%E3%83%95%E3%83%AA%E3%83%BC%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B35_tutcob.png' style="width:50px; height:50px;"></a>
<div class="card col-sm-6 my-3 mx-auto">
     <a href="{{ route('posts.show', $post->id) }}">
          <h2>{{ $post->title }}</h2>
     </a>
     <a href="{{ route('users.show', Auth::user()->id) }}"><img src="{{ $post->user->image_path }}" alt="プロフィール画像" style="width:50px; height:50px;"></a>
     {{ $post->updated_at->format('Y/m/d H:i:s') }}
     <div class="card-body">
          <p class="card-text">{{ $post->content }}</p>
     </div>
     <img src="{{ $post->image_path }}" alt="画像" style="width:200px; height:200px;" class="mx-auto">
     @if($post->users()->where('user_id', Auth::id())->exists())
     <form action="{{ route('unfavorites', $post) }}" method="POST">
          @csrf
          <input type="submit" value="&#xf164;" class="fas btn btn-success">
     </form>
     @else
     <form action="{{ route('favorites', $post) }}" method="POST">
          @csrf
          <input type="submit" value="&#xf164;" class="fas">
     </form>
     @endif
     {{ $post->users()->count() }}
</div>
<br>
@endforeach
@endsection