@extends('layouts.app')

@section('content')
<div class="card post-menu-card col-sm-3">
     <nav class="post-menu">
          <a href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
          <a href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
          <a href="{{ route('users.show', Auth::user()->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
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
<form enctype="multipart/form-data" class="col-sm-6 mx-auto" method="POST" action="{{ route('posts.update', $post->id) }}">
     @method('PUT')
     @csrf
     <div class="form-group">
          <label for="image">画像</label>
          <input type="file" class="form-control-file" id="image" name="image">
          <img src="{{ $post->image_path }}" alt="画像" style="width:100px; height:100px;">
     </div>
     @foreach ($errors->all() as $error)
     <p class="text-center text-danger">{{ $error }}</p>
     @endforeach
     <div class="form-group">
          <label for="title">タイトル</label>
          <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
          <small id="emailHelp" class="form-text text-muted">タイトルの入力は必須です</small>
     </div>
     <div class="form-group">
          <label for="content">内容</label>
          <textarea type="text" class="form-control" name="content" id="content" rows="4" cols="40">{{ $post->content }}</textarea>
     </div>
     <div class="form-group">
          <label for="url">関連URL・リンク</label>
          <input type="url" class="form-control" id="url" value="{{ $post->url }}" name="url">
     </div>
     <button type="submit" class="btn btn-primary">更新する</button>
</form>
<a href="{{ route('posts.index') }}">戻る</a>
@endsection