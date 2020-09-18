@extends('layouts.app')

@section('content')
<a href="{{ route('posts.index') }}" class="btn btn-info">戻る</a>
<div class="card col-sm-6 my-3 mx-auto">
<h2>{{ $post->title }}</h2>
{{ $post->updated_at->format('Y/m/d H:i:s') }}
<img src="{{ $post->image_path }}" alt="画像" style="width:500px; height:500px;" class="mx-auto"><br>
{{ $post->content }}<br>
<p>URL：<a href="{{ $post->url }}" target="_blank" rel="noopener noreferrer">{{ $post->url }}</a></p>
@if($post->user_id === Auth::id()) 
<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info col-sm-1">編集</a>
<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
     @method('DELETE')
     @csrf
     <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
</form>
@endif
<form action="{{ route('comments.store') }}" method="POST">
     @csrf
     <div class="form-group">
          <input type="hidden" name="post_id" value="{{ $post->id }}">
          <label for="comment">コメント</label>
          <textarea type="text" name="comment" class="form-control" id="comment" placeholder="コメントを入力してください"></textarea>
     </div>
     <button type="submit" class="btn btn-primary">コメントする</button>
</form>
@foreach($post->comments as $comment)
<div class="card">
     <div class="card-header">
          投稿者：{{ $comment->user->name }}
     </div>
     <div class="card-body">
          <blockquote class="blockquote mb-0">
               <p>{{ $comment->comment }}</p>
               <footer class="blockquote-footer">{{ $comment->created_at }}</footer>
          </blockquote>
     </div>
</div>
</div>
@endforeach

@endsection