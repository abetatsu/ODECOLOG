@extends('layouts.app')

@section('content')
<a href="{{ route('posts.index') }}">投稿記事一覧に戻る</a>
<a href="{{ route('records.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1600236686/%E3%83%A1%E3%83%A2%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B3_p2hshu.png" alt="投稿する" style="width:50px; height:50px;"></a>
<a href="{{ route('gallery.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1600433989/%E5%86%99%E7%9C%9F%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B310_ufanjr.png" alt="photogallery" style="width:50px; height:50px;"></a>
{!! $tag !!}
@endsection