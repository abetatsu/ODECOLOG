@extends('layouts.app')

@section('content')
@include('layouts.menu')
<div id="formWrapper">
     <form action="https://docs.google.com/forms/u/2/d/e/1FAIpQLScZGrcileAJhO2PTpyy8-m39CHc5WANCV7quXmlEWtuWEfLmg/formResponse" class="mx-auto col-md-6 form-wrap my-5" method="post" name="myForm" target="dummyIframe">
          @csrf
          <h2 class="text-center text-muted">お問い合わせ確認フォーム</h2>
          @if ($errors->has('name'))
          <p class="text-danger">{{$errors->first('name')}}</p>
          @endif
          <div class="form-group text-muted">
               <label for="name">お名前(必須)</label>
               <input type="text" class="form-control" id="name" value="{{ $name }}" name="entry.350302315" required>
          </div>
          @if ($errors->has('email'))
          <p class="text-danger">{{$errors->first('email')}}</p>
          @endif
          <div class="form-group text-muted">
               <label for="email">メールアドレス(必須)</label>
               <input type="email" class="form-control" id="email" value="{{ $email }}" name="entry.1406123573" required>
          </div>
          @if ($errors->has('message'))
          <p class="text-danger">{{$errors->first('message')}}</p>
          @endif
          <div class="form-group text-muted">
               <label for="message">お問い合わせ内容(必須)</label>
               <textarea class="form-control" id="message" rows="5" name="entry.184607872" required>{{ $message }}</textarea>
          </div>
          <button type="submit" class="login-button text-muted" onclick="sendGform()">送信する</button>
     </form>
     <iframe name="dummyIframe" style="display:none;"></iframe>
</div>
<div id="thxMessage" style="display:none;">
     <div class="card card-post col-sm-6 my-5 mx-auto">
          <p class="text-center my-5 text-muted">お問い合わせありがとうございます。頂いた内容はサービス改善に役立たせて頂きます。</p>
          <img src="https://res.cloudinary.com/tatsu/image/upload/v1601630099/humaaans_2_j5hcgf.png" alt="画像" class="user-nopost-image">
     </div>
</div>
@endsection