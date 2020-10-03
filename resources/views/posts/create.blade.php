@extends('layouts.app')

@section('content')
<div class="card post-menu-card col-sm-3">
     <nav class="post-menu">
          <a class="text-muted" href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
          <a class="text-muted" href="{{ route('posts.create') }}" style="border-bottom:#6c757d solid 1px;"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
          <a class="text-muted" href="{{ route('users.show', Auth::user()->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
          <a class="text-muted" href="{{ route('records.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034931/calendar_cplkec.svg">CALENDAR</a>
          <a class="text-muted" href="{{ route('photos.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034942/image_ckvyba.svg">GALLERY</a>
          <a class="text-muted" href="{{ route('terms.help') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601694212/circle-help_bt6r0s.svg">HELP</a>
          <a class="text-muted" href="{{ url('contact') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601038055/email_iny45a.svg">CONTACT US</a>
          <label for="logout-menu3">
               <form class="dot-menu-item text-muted logout-form-menu" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601081054/log-out_gwkzdh.svg"><input id="logout-menu3" class="btn btn-link" type="submit" value="LOG-OUT" onclick='return confirm("ログアウトしますか？");'>
               </form>
          </label>
     </nav>
</div>
<form enctype="multipart/form-data" class="col-sm-6 mx-auto my-5 form-wrap" method="POST" action="{{ route('posts.store') }}">
     @csrf
     <h2 class="text-center text-muted">新規投稿作成フォーム</h2>
     <p class="text-center text-muted mt-4 form-sub-text">あなたにとっては何気ないことでも他のユーザーにとっては耳寄りの情報かもしれません。</p>
     <p class="text-center text-muted form-sub-text">例）ケア用品、日課、飲んでみた薬、スカルプケアの美容室、おすすめの髪型</p>
     <p class="text-center text-muted form-sub-text">クリニックに通ってみた経験、失敗談、気になっていることの質問、シェアしたい記事など</p>
     <p class="text-center text-muted form-sub-bottom">どんどん投稿してみましょう。後から編集・削除も可能です。</p>
     @if ($errors->any())
     @foreach ($errors->all() as $error)
     <p class="text-center text-danger">{{ $error }}</p>
     <p class="text-center text-danger">画像を選択された方は、恐れ入りますが再度画像を選択してください。</p>
     @endforeach
     @endif
     <div class="form-group text-muted">
          <label for="image">画像</label>
          <input type="file" class="form-control-file" id="image" name="image">
     </div>
     <div class="form-group text-muted">
          <label for="title">タイトル</label><small class="d-inline-block ml-3 text-muted">タイトルの入力は必須です</small>
          <input type="text" class="form-control" name="title" id="title" placeholder="タイトルを入力してください(30文字以内)">
     </div>
     <div class="form-group text-muted">
          <label for="content">内容</label><small class="d-inline-block ml-3 text-muted">内容の入力は必須です</small>
          <textarea type="text" class="form-control" name="content" id="content" placeholder="内容を入力してください(1000文字以内)" rows="4" cols="40">
          </textarea>
     </div>
     <div class="form-group text-muted">
          <label for="url">関連URL・リンク</label>
          <input type="url" class="form-control" id="url" placeholder="関連URL・リンクを入力してください" name="url">
     </div>
     <button type="submit" class="login-button text-muted">投稿する</button>
</form>
@endsection
