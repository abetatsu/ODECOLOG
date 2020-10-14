@extends('layouts.app')
@section('content')
@include('layouts.menu')
<div class="card col-md-6 mx-auto my-5 profile-show">
     @if($user->id === Auth::id())
     <div class="dot-menu-profile">
          @include('users._dot-menu', [
               'id' => $user->id,
               'editRoute' => 'users.edit',
               'deleteRoute' => 'users.destroy',
          ])
     </div>
     @endif
     <div class="row">
          <div class="card-body col-md-5 profile-show-body">
               @if(empty($user->image_path))
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601430063/noImage_iplfhh.png" alt="画像" class="profile-image">
               @else
               <div class="icon-container">
                    <img class="icon" src="{{ $user->image_path }}" alt="">
               </div>
               @endif
          </div>
          <div class="card-body col-5 profile-detail profile-show-body">
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
