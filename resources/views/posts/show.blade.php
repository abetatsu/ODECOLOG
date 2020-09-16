@extends('layouts.app')

@section('content')
{{ $post->title }}
{{ $post->content }}
{{ $post->url }}
{{ $post->updated_at }}
<img src="{{ $post->image_path }}" alt="画像" style="width:200px; height:200px;"><br>
<a href="{{ route('posts.edit', $post->id) }}">編集</a>
<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
     @method('DELETE')
     @csrf
     <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
</form>
<a href="{{ route('posts.index') }}">戻る</a>
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
@endforeach

@endsection