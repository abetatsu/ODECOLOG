@extends('layouts.app')

@section('content')
<form enctype="multipart/form-data" class="col-sm-6 mx-auto" method="POST" action="{{ route('posts.update', $post->id) }}">
     @method('PUT')
     @csrf
     <div class="form-group">
          <label for="image">画像</label>
          <input type="file" class="form-control-file" id="image" name="image">
          <img src="{{ $post->image_path }}" alt="画像">
     </div>
     @foreach ($errors->all() as $error)
     <p class="text-center text-danger">{{ $error }}</p>
     @endforeach
     <div class="form-group">
          <label for="title">タイトル</label>
          <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
          <small id="emailHelp" class="form-text text-muted">タイトルの入力は必須です</small>
     </div>
     <div class="form-group">
          <label for="content">内容</label>
          <textarea type="text" class="form-control" name="content" id="content" rows="4" cols="40">{{ $post->content }}</textarea>
     </div>
     <div class="form-group">
          <label for="url">関連URL・リンク</label>
          <input type="url" class="form-control" id="url" value="{{ $post->url }}" name="url">
     </div>
     <button type="submit" class="btn btn-primary">更新する</button>
</form>
<a href="{{ route('posts.index') }}">戻る</a>
@endsection