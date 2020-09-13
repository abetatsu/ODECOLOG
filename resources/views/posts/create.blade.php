@extends('layouts.app')

@section('content')
<form enctype="multipart/form-data" class="col-sm-6 mx-auto" method="POST" action="{{ route('posts.store') }}">
     @csrf
     <div class="form-group">
          <label for="image">画像</label>
          <input type="file" class="form-control-file" id="image" name="image">
     </div>
     @foreach ($errors->all() as $error)
     <p class="text-center text-danger">{{ $error }}</p>
     @endforeach
     <div class="form-group">
          <label for="title">タイトル</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="タイトルを入力してください">
          <small id="emailHelp" class="form-text text-muted">タイトルの入力は必須です</small>
     </div>
     <div class="form-group">
          <label for="content">内容</label>
          <textarea type="text" class="form-control" name="content" id="content" placeholder="内容を入力してください" rows="4" cols="40">
          </textarea>
     </div>
     <div class="form-group">
          <label for="url">関連URL・リンク</label>
          <input type="url" class="form-control" id="url" placeholder="関連URL・リンクを入力してください" name="url">
     </div>
     <button type="submit" class="btn btn-primary">投稿する</button>
</form>
@endsection