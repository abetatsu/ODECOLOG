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
<br>
@endforeach
@endsection