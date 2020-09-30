@extends('layouts.app')
@section('content')
<div class="card post-menu-card col-sm-3">
     <nav class="post-menu">
          <a href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
          <a href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
          <a href="{{ route('users.show', Auth::user()->id) }}" style="border-bottom:#111 solid 1px;"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
          <a href="{{ route('records.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034931/calendar_cplkec.svg">CALENDAR</a>
          <a href="{{ route('photos.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034942/image_ckvyba.svg">GALLERY</a>
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
<div class="card col-md-6 mx-auto my-5 profile-show">
     @if($user->id === Auth::id())
     <div class="dropdown dot-menu">
          <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601111215/options-horizontal_i4cub7.svg">
          </div>
          <div class="dropdown-menu dropdown-menu-bg" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item dot-menu-item" href="{{ route('users.edit', $user->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172995/edit_g4swwu.svg">EDIT</a>
               <a class="dropdown-item dot-menu-item"  onclick="event.preventDefault();
                                                  document.getElementById('delete-user').submit();"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172993/delete_b1rjwi.svg">DELETE</a>
               <form id="delete-user" action="" method="POST" style="display:none;">
                    @method('DELETE')
                    @csrf
               </form>
          </div>
     </div>
     @endif
     <div class="row">
          <div class="card-body col-md-5">
               @if(empty($user->image_path))
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601430063/noImage_iplfhh.png" alt="画像" class="profile-image">
               @else
               <img src="{{ $user->image_path }}" alt="画像" class="profile-image">
               @endif
          </div>
          <div class="card-body col-md-5">
               <p class="d-inline-block">名前：{{ $user->name }}</p>
               <p>投稿数：{{ $user->posts->count() }}</p>
               <p>年齢：{{ $user->age }}</p>
               <p>職業：{{ $user->job }}</p>
          </div>
     </div>
</div>
<h2 class="text-center">投稿一覧</h2>
<hr class="col-sm-6">
@foreach($posts as $post)
<div class="card card-post col-sm-6 my-5 mx-auto">
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
          <a href="{{ route('users.show', $post->user->id) }}" class="post-profiles">
               @if(empty($post->user->image_path))
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601430063/noImage_iplfhh.png" alt="プロフィール画像" class="post-profile">
               @else
               <img src="{{ $post->user->image_path }}" alt="プロフィール画像" class="post-profile">
               @endif
          </a>
          <a href="{{ route('users.show', $post->user->id) }}" class="post-profile-name">{{ $post->user->name }}</a>
          <p class="post-profiles">{{ $post->created_at->diffForHumans(Carbon\Carbon::now()) }}</p>
     </div>
     <h2 class="post-title">
          <a href="{{ route('posts.show', $post->id) }}">
               『{{ $post->title }}』
          </a>
     </h2>
     <div class="card-body">
          <p class="card-text">{{ $post->content }}</p>
     </div>
     @if(isset($post->image_path))
     <img src="{{ $post->image_path }}" alt="画像" class="post-image mx-auto">
     @endif
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
@endforeach
<div class="row justify-content-center">{{ $posts->links() }}</div>
@endsection
