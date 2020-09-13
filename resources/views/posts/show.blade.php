@extends('layouts.app')

@section('content')
{{ $post->title }}
{{ $post->content }}
{{ $post->url }}
{{ $post->updated_at }}
<img src="{{ $post->image_path }}" alt="画像">
<a href="{{ route('posts.edit', $post->id) }}">編集</a>
<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
     @method('DELETE')
     @csrf
     <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
</form>
<a href="{{ route('posts.index') }}">戻る</a>
@endsection