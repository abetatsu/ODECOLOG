@extends('layouts.app')

@section('content')
@include('layouts.menu')
<div class="card col-md-6 my-5 mx-auto profile-show">
     @if($post->user_id === Auth::id())
     <div class="dot-menu-show">
          @include('layouts._dot-menu', [
               'id' => $post->id,
               'editRoute' => 'posts.edit',
               'deleteRoute' => 'posts.destroy',
          ])
     </div>
     @endif
     <div class="post-top">
          <a href="{{ route('users.show', $post->user->id) }}" class="post-profiles">
               @if(empty($post->user->image_path))
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601430063/noImage_iplfhh.png" alt="プロフィール画像" class="post-profile">
               @else
               <img src="{{ $post->user->image_path }}" alt="プロフィール画像" class="post-profile">
               @endif
          </a>
          <a href="{{ route('users.show', $post->user->id) }}" class="post-profile-name text-muted">{{ $post->user->name }}</a>
     </div>
     <h2 class="post-title text-muted">『{{ $post->title }}』</h2>
     <div class="card-body">
          <p class="card-text text-muted">{{ $post->content }}</p>
     </div>
     @if(isset($post->url))
          <p class="post-show-url text-muted">URL：<a href="{{ $post->url }}" target="_blank" rel="noopener noreferrer" class="text-muted">{{ $post->url }}</a></p>
     @endif
     @if(isset($post->image_path))
          <img src="{{ $post->image_path }}" alt="画像" class="post-show-image mx-auto">
     @endif
     <p class="post-show-date text-muted">{{ $post->updated_at->format('Y/m/d H:i:s') }}</p>
     <hr>
     <div class="row pb-3">
          <div class="col-4 post-icon">
               <like-component :post="{{ json_encode($post) }}"></like-component>
          </div>
          <div class="col-4 post-icon">
               <dislike-component :post="{{ json_encode($post) }}"></dislike-component>
          </div>
          <div class="col-4 post-icon">
               <a href="#comment" class="text-muted"><i class="fas fa-comments"></i> {{ count($post->comments) }}</a>
          </div>
     </div>
</div>
<div class="card col-md-6 mx-auto profile-show" id="comment">
     <h2 class="text-center disscuss text-muted mb-5">Conversation</h2>
     @if($post->comments->isEmpty())
     <img src="https://res.cloudinary.com/tatsu/image/upload/v1601204891/humaaans_va79aq.png" alt="コメント画像" class="discuss-image">
     @endif
     @foreach($post->comments as $comment)
     <div class="comment-wrap">
          @if($comment->user_id === Auth::id())
          <div class="dropdown dot-menu-comments">
               <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601111215/options-horizontal_i4cub7.svg">
               </div>
               <div class="dropdown-menu dropdown-menu-bg" aria-labelledby="dropdownMenuButton">
                    <!-- Button trigger modal -->
                    <a class="dropdown-item dot-menu-item text-muted post-show-edit" data-toggle="modal" data-target="#editModal{{ $comment->id }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172995/edit_g4swwu.svg">EDIT</a>
                    <label for="post-comment-delete{{ $comment->id }}">
                         <form class="dropdown-item dot-menu-item text-muted" action="/comments/{{ $comment->id }}/{{ $post->id }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <img src="https://res.cloudinary.com/tatsu/image/upload/v1601172993/delete_b1rjwi.svg"><input id="post-comment-delete{{ $comment->id }}" class="btn btn-link" type="submit" value="DELETE" onclick='return confirm("削除しますか？");'>
                         </form>
                    </label>
               </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="editModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                              <div class="comment-edit-profile">
                                   <a href="{{ route('users.show', $comment->user->id) }}" class=""><img src="{{ $comment->user->image_path }}" alt="プロフィール画像" class="post-profile"></a>
                                   <a href="{{ route('users.show', $comment->user->id) }}" class="comment-edit-name text-muted">{{ $comment->user->name }}</a>
                                   <footer class="blockquote-footer">{{ $post->created_at->diffForHumans(Carbon\Carbon::now()) }}</footer>
                              </div>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                              </button>
                         </div>
                         <div class="modal-body">
                              <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                                   @method('PUT')
                                   @csrf
                                   <input class="comment-edit-input" name="comment" type="text" value="{{ $comment->comment }}">
                                   <input type="submit" class="login-button mt-2" value="変更する">
                              </form>
                         </div>
                    </div>
               </div>
          </div>
          @endif
          <div class="comment-align">
               <a href="{{ route('users.show', $comment->user->id) }}" class="comment-profiles">
                    @if(empty($comment->user->image_path))
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601430063/noImage_iplfhh.png" alt="プロフィール画像" class="post-profile">
                    @else
                    <img src="{{ $comment->user->image_path }}" alt="プロフィール画像" class="post-profile">
                    @endif
               </a>
               <a href="{{ route('users.show', $comment->user->id) }}" class="comment-profile-name text-muted">{{ $comment->user->name }}</a>
               <footer class="blockquote-footer">{{ $post->created_at->diffForHumans(Carbon\Carbon::now()) }}</footer>
          </div>
          <p class="comment-content text-muted">{{ $comment->comment }}</p>
     </div>
     @endforeach
     <hr>
     @foreach ($errors->all() as $error)
     <p class="text-center text-danger">{{ $error }}</p>
     @endforeach
     <form action="{{ route('comments.store') }}" method="POST" class="comment-form">
          @csrf
          <div class="col-10">
               <input type="hidden" name="post_id" id="comment" value="{{ $post->id }}">
               <input type="text" name="comment" class="form-control comment-input" placeholder="コメントする(100文字以内)"></input>
          </div>
          <button type="submit" class="col-2 comment-button text-muted">投稿</button>
     </form>
</div>
@endsection