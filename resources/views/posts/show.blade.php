@extends('layouts.app')

@section('content')
{{ $post->title }}
{{ $post->content }}
{{ $post->url }}
{{ $post->updated_at }}
<img src="{{ $post->image_path }}" alt="画像">
<a href="{{ route('posts.edit', $post->id) }}">編集</a>
<a href="{{ route('posts.index') }}">戻る</a>
@endsection