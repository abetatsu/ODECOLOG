@extends('layouts.app')
@section('content')
@include('layouts.menu')
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
<hr class="col-md-6">
@if($posts->isEmpty())
<div class="card card-post col-md-6 my-5 mx-auto">
     <p class="text-center my-5 text-muted">あなたの疑問、経験をみんなと共有しましょう。</p>
     <img src="https://res.cloudinary.com/tatsu/image/upload/v1601630099/humaaans_2_j5hcgf.png" alt="画像" class="user-nopost-image">
</div>
@else
@foreach($posts as $post)
@include('posts._card')
@endforeach
@endif
<div class="row justify-content-center">{{ $posts->links() }}</div>
@endsection