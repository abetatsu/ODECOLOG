@extends('layouts.app')

@section('content')
@include('layouts.menu')
<form enctype="multipart/form-data" class="col-md-6 mx-auto my-5 form-wrap" method="POST" action="{{ route('posts.update', $post->id) }}">
     @method('PUT')
     @csrf
     <h2 class="text-center text-muted">投稿編集フォーム</h2>
     <div class="form-group text-muted">
          <label for="image">画像</label>
          <input type="file" class="form-control-file" id="image" name="image">
          <img src="{{ $post->image_path }}" alt="画像" class="form-image">
     </div>
     @if ($errors->any())
     @foreach ($errors->all() as $error)
     <p class="text-center text-danger">{{ $error }}</p>
     <p class="text-center text-danger">画像を選択された方は、恐れ入りますが再度画像を選択してください。</p>
     @endforeach
     @endif
     <div class="form-group text-muted">
          <label for="title">タイトル</label><small class="d-inline-block ml-3 text-muted">タイトルの入力は必須です</small>
          <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
     </div>
     <div class="form-group text-muted">
          <label for="content">内容</label><small class="d-inline-block ml-3 text-muted">内容の入力は必須です</small>
          <textarea type="text" class="form-control" name="content" id="content" rows="4" cols="40">{{ $post->content }}</textarea>
     </div>
     <div class="form-group text-muted">
          <label for="url">関連URL・リンク</label>
          <input type="url" class="form-control" id="url" value="{{ $post->url }}" name="url">
     </div>
     <button type="submit" class="login-button text-muted">更新する</button>
</form>
@endsection