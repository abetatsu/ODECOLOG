@extends('layouts.app')

@section('content')
{{ $user->name }}
{{ $user->age }}
{{ $user->job }}
<img src="{{ $user->image_path }}" alt="画像">
<a href="{{ route('posts.index') }}">投稿一覧ページに戻る</a>
@endsection