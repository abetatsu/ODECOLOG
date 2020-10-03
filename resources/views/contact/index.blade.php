@extends('layouts.app')

@section('content')
<div class="card post-menu-card col-sm-3">
     <nav class="post-menu">
          <a class="text-muted" href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
          <a class="text-muted" href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
          <a class="text-muted" href="{{ route('users.show', Auth::user()->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
          <a class="text-muted" href="{{ route('records.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034931/calendar_cplkec.svg">CALENDAR</a>
          <a class="text-muted" href="{{ route('photos.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034942/image_ckvyba.svg">GALLERY</a>
          <a class="text-muted" href="{{ url('contact') }}" style="border-bottom:#6c757d solid 1px;"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601038055/email_iny45a.svg">CONTACT US</a>
          <label for="logout-menu12">
               <form class="dot-menu-item text-muted logout-form-menu" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601081054/log-out_gwkzdh.svg"><input id="logout-menu12" class="btn btn-link" type="submit" value="LOG-OUT" onclick='return confirm("ログアウトしますか？");'>
               </form>
          </label>
     </nav>
</div>
<form action="{{ route('confirm') }}" method="post" class="mx-auto col-sm-6 form-wrap my-5">
     @csrf
     <h2 class="text-center text-muted">お問い合わせフォーム</h2>
     @if ($errors->has('name'))
     <p class="text-danger">{{$errors->first('name')}}</p>
     @endif
     <div class="form-group text-muted">
          <label for="name">お名前(必須)</label>
          <input type="text" class="form-control" id="name" placeholder="{{ $user->name }}" value="{{ old('name') }}" name="name">
     </div>
     @if ($errors->has('email'))
     <p class="text-danger">{{$errors->first('email')}}</p>
     @endif
     <div class="form-group text-muted">
          <label for="email">メールアドレス(必須)</label>
          <input type="email" class="form-control" id="email" placeholder="{{ $user->email }}" value="{{ old('email') }}" name="email">
     </div>
     @if ($errors->has('message'))
     <p class="text-danger">{{$errors->first('message')}}</p>
     @endif
     <div class="form-group text-muted">
          <label for="message">お問い合わせ内容(必須)</label>
          <textarea class="form-control" id="message" rows="5" name="message" placeholder="お問い合わせ内容を入力してください">{{ old('message') }}</textarea>
     </div>
     <button type="submit" class="login-button text-muted">確認画面へ</button>
</form>
</div>
@endsection