@extends('layouts.app')

@section('content')
<a href="{{ route('posts.create') }}">記事を投稿する</a>
<br>
@foreach($posts as $post)
{{ $post->title }}
{{ $post->content }}
{{ $post->url }}
{{ $post->updated_at }}
<img src="{{ $post->image_path }}" alt="画像">
<a href="{{ route('posts.show', $post->id) }}">詳細</a>
<br>
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
@endforeach
@endsection