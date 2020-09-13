@extends('layouts.app')

@section('content')
{{ $post->title }}
{{ $post->content }}
{{ $post->url }}
{{ $post->updated_at }}
<img src="{{ $post->image_path }}" alt="画像">
@endsection