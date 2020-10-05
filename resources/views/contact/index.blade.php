@extends('layouts.app')

@section('content')
@include('layouts.menu')
<form action="{{ route('confirm') }}" method="post" class="mx-auto col-md-6 form-wrap my-5">
     @csrf
     <h2 class="text-center text-muted">お問い合わせフォーム</h2>
     <p class="text-center text-muted">サービスの改善に役立たせていただきます</p>
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