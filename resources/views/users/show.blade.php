@extends('layouts.app')
@section('content')
<div class="card post-menu-card col-sm-3">
     <nav class="post-menu">
          <a class="text-muted" href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
          <a class="text-muted" href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
          <a class="text-muted" href="{{ route('users.show', Auth::user()->id) }}" style="border-bottom:#6c757d solid 1px;"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
          <a class="text-muted" href="{{ route('records.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034931/calendar_cplkec.svg">CALENDAR</a>
          <a class="text-muted" href="{{ route('photos.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034942/image_ckvyba.svg">GALLERY</a>
          <a class="text-muted" href="{{ url('contact') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601038055/email_iny45a.svg">CONTACT US</a>
          <label for="logout-menu10">
               <form class="dot-menu-item text-muted logout-form-menu" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601081054/log-out_gwkzdh.svg"><input id="logout-menu10" class="btn btn-link" type="submit" value="LOG-OUT" onclick='return confirm("ログアウトしますか？");'>
               </form>
          </label>
     </nav>
</div>
<div class="card col-md-6 mx-auto my-5 profile-show">
     @if($user->id === Auth::id())
     <div class="dropdown dot-menu-profile">
          <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601111215/options-horizontal_i4cub7.svg">
          </div>
          <div class="dropdown-menu dropdown-menu-bg" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item dot-menu-item text-muted btn btn-link post-show-edit" href="{{ route('users.edit', $user->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172995/edit_g4swwu.svg">EDIT</a>
               <label for="profile-delete">
                    <form class="dropdown-item dot-menu-item text-muted" action="{{ route('users.destroy', $user->id) }}" method="POST">
                         @method('DELETE')
                         @csrf
                         <img src="https://res.cloudinary.com/tatsu/image/upload/v1601172993/delete_b1rjwi.svg"><input id="profile-delete" class="btn btn-link" type="submit" value="WITHDRAWAL" onclick='return confirm("あなたのプロフィール、今までの記録、投稿の全てが削除されます。本当に退会しますか?");'>
                    </form>
               </label>
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
          <div class="card-body col-md-5 profile-detail">
               <p class="text-muted">名前：{{ $user->name }}</p>
               <p class="text-muted">投稿数：{{ $user->posts->count() }}</p>
               <p class="text-muted">コメント数：{{ $user->comments->count() }}</p>
               <p class="text-muted">年齢：{{ $user->age }}</p>
               <p class="text-muted mb-0">職業：{{ $user->job }}</p>
          </div>
     </div>
</div>
<h2 class="text-center text-muted">投稿一覧</h2>
<hr class="col-sm-6">
@if($posts->isEmpty())
<div class="card card-post col-sm-6 my-5 mx-auto">
     <p class="text-center my-5">あなたの疑問、経験をみんなと共有しましょう。</p>
     <img src="https://res.cloudinary.com/tatsu/image/upload/v1601630099/humaaans_2_j5hcgf.png" alt="画像" class="user-nopost-image">
</div>
@else
@foreach($posts as $post)
<div class="card card-post col-sm-6 my-5 mx-auto">
     @if($post->user_id === Auth::id())
     <div class="dropdown dot-menu">
          <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601111215/options-horizontal_i4cub7.svg">
          </div>
          <div class="dropdown-menu dropdown-menu-bg" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item dot-menu-item text-muted btn btn-link post-show-edit" href="{{ route('posts.edit', $post->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172995/edit_g4swwu.svg">EDIT</a>
               <label for="profile-post-delete{{ $post->id }}">
                    <form class="dropdown-item dot-menu-item text-muted" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                         @method('DELETE')
                         @csrf
                         <img src="https://res.cloudinary.com/tatsu/image/upload/v1601172993/delete_b1rjwi.svg"><input id="profile-post-delete{{ $post->id }}" class="btn btn-link" type="submit" value="DELETE" onclick='return confirm("削除しますか？");'>
                    </form>
               </label>
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
          <a href="{{ route('users.show', $post->user->id) }}" class="post-profile-name text-muted">{{ $post->user->name }}</a>
          <p class="post-profiles text-muted">{{ $post->created_at->diffForHumans(Carbon\Carbon::now()) }}</p>
     </div>
     <h2 class="post-title">
          <a href="{{ route('posts.show', $post->id) }}" class="text-muted">
               『{{ $post->title }}』
          </a>
     </h2>
     <div class="card-body">
          @php $content = Illuminate\Support\Str::limit($post->content,150); @endphp
          <p class="card-text text-muted">{{ $content }} <a href="{{ route('posts.show', $post->id) }}" class="text-muted">続きをみる</a></p>
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
@endif
<div class="row justify-content-center">{{ $posts->links() }}</div>
@endsection