@extends('layouts.app')

@section('content')
<div class="card post-menu-card col-sm-3">
     <nav class="post-menu">
          <a href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
          <a href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
          <a href="{{ route('users.show', Auth::user()->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
          <a href="{{ route('records.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034931/calendar_cplkec.svg">CALENDAR</a>
          <a href="{{ route('gallery.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034942/image_ckvyba.svg">GALLERY</a>
          <a href="{{ url('contact') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601038055/email_iny45a.svg">CONTACT US</a>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601081054/log-out_gwkzdh.svg">LOG-OUT
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
          </form>
     </nav>
</div>
<div class="card col-sm-6 my-5 mx-auto profile-show">
     @if($post->user_id === Auth::id())
     <div class="dropdown dot-menu">
          <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601111215/options-horizontal_i4cub7.svg">
          </div>
          <div class="dropdown-menu dropdown-menu-bg" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item dot-menu-item" href="{{ route('posts.edit', $post->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172995/edit_g4swwu.svg">EDIT</a>
               <a class="dropdown-item dot-menu-item" href="{{ route('posts.destroy', $post->id) }}" onclick="event.preventDefault();
                                             document.getElementById('delete-post').submit();"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172993/delete_b1rjwi.svg">DELETE</a>
               <form id="delete-post" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:none;">
                    @method('DELETE')
                    @csrf
               </form>
          </div>
     </div>
     @endif
     <div class="post-top">
          <a href="{{ route('users.show', $post->user->id) }}" class="post-profiles"><img src="{{ $post->user->image_path }}" alt="プロフィール画像" class="post-profile"></a>
          <a href="{{ route('users.show', $post->user->id) }}" class="post-profile-name">{{ $post->user->name }}</a>
     </div>
     <h2 class="post-title">『{{ $post->title }}』</h2>
     <div class="card-body">
          <p class="card-text">{{ $post->content }}</p>
     </div>
     <p class="post-show-url">URL：<a href="{{ $post->url }}" target="_blank" rel="noopener noreferrer">{{ $post->url }}</a></p>
     <img src="{{ $post->image_path }}" alt="画像" class="post-show-image mx-auto">
     <p class="post-show-date">{{ $post->updated_at->format('Y/m/d H:i:s') }}</p>
     <hr>
     <div class="row pb-3">
          <div class="col-4 post-icon">
               <like-component :post="{{ json_encode($post) }}"></like-component>
          </div>
          <div class="col-4 post-icon">
               <dislike-component :post="{{ json_encode($post) }}"></dislike-component>
          </div>
          <div class="col-4 post-icon">
               <a href="{{ route('posts.show', $post->id) }}"><i class="fas fa-comments"></i></a>
          </div>
     </div>
</div>
<div class="card col-sm-6 my-5 mx-auto profile-show">
     <h2 class="text-center disscuss">Discussion</h2>
     <img src="https://res.cloudinary.com/tatsu/image/upload/v1601204891/humaaans_va79aq.png" alt="コメント画像" class="discuss-image">
     @foreach($post->comments as $comment)
     <div class="comment-wrap">
          @if($comment->user_id === Auth::id())
          <div class="dropdown dot-menu-comments">
               <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601111215/options-horizontal_i4cub7.svg">
               </div>
               <div class="dropdown-menu dropdown-menu-bg" aria-labelledby="dropdownMenuButton">
                    <!-- Button trigger modal -->
                    <a class="dropdown-item dot-menu-item" data-toggle="modal" data-target="#exampleModal"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172995/edit_g4swwu.svg">EDIT</a>
                    <a class="dropdown-item dot-menu-item" href="{{ route('comments.destroy', $comment->id) }}" onclick="event.preventDefault();
                                                  document.getElementById('delete-post').submit();"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172993/delete_b1rjwi.svg">DELETE</a>
                    <form id="delete-post" action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:none;">
                         @method('DELETE')
                         @csrf
                    </form>
               </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                              <div class="comment-edit-profile">
                                   <a href="{{ route('users.show', $comment->user->id) }}" class=""><img src="{{ $comment->user->image_path }}" alt="プロフィール画像" class="post-profile"></a>
                                   <a href="{{ route('users.show', $comment->user->id) }}" class="comment-edit-name">{{ $comment->user->name }}</a>
                                   <footer class="blockquote-footer">{{ $post->created_at->diffForHumans(Carbon\Carbon::now()) }}</footer>
                              </div>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                              </button>
                         </div>
                         <div class="modal-body">
                              <form action="{{ route('comments.update', $post->id) }}" method="POST">
                                   @method('PUT')
                                   @csrf
                                   <input class="comment-edit-input" name="comment" type="text" value="{{ $comment->comment }}">
                                   <input type="submit" class="btn btn-secondary" value="変更する">
                              </form>
                         </div>
                    </div>
               </div>
          </div>
          @endif
          <div class="comment-align">
               <a href="{{ route('users.show', $comment->user->id) }}" class="comment-profiles"><img src="{{ $comment->user->image_path }}" alt="プロフィール画像" class="post-profile"></a>
               <a href="{{ route('users.show', $comment->user->id) }}" class="comment-profile-name">{{ $comment->user->name }}</a>
               <footer class="blockquote-footer">{{ $post->created_at->diffForHumans(Carbon\Carbon::now()) }}</footer>
          </div>
          <p class="comment-content">{{ $comment->comment }}</p>
     </div>
     @endforeach
     <hr>
     @foreach ($errors->all() as $error)
     <p class="text-center text-danger">{{ $error }}</p>
     @endforeach
     <form action="{{ route('comments.store') }}" method="POST" class="comment-form">
          @csrf
          <div class="form-group col-10">
               <input type="hidden" name="post_id" id="comment" value="{{ $post->id }}">
               <textarea type="text" name="comment" class="form-control comment-input" placeholder="コメントする(100文字以内)"></textarea>
          </div>
          <button type="submit" class="col-2 comment-button">投稿</button>
     </form>
</div>
@endsection
