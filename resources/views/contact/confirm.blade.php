@extends('layouts.app')

@section('content')
<h1 class="text-center">お問い合わせフォーム</h1>

<div id="formWrapper">
     <form action="https://docs.google.com/forms/u/0/d/e/1FAIpQLScgYgfSv6fWkNde3KLr5xFNoJX8JfVK4WQKtzwA_88HZIQswg/formResponse" class="mx-auto col-sm-6" method="post" name="myForm" target="dummyIframe">
          @csrf
          @if ($errors->has('name'))
          <p class="text-danger">{{$errors->first('name')}}</p>
          @endif
          <div class="form-group">
               <label for="name">お名前(必須)</label>
               <input type="text" class="form-control" id="name" value="{{ $name }}" name="entry.291635534" required>
          </div>
          @if ($errors->has('email'))
          <p class="text-danger">{{$errors->first('email')}}</p>
          @endif
          <div class="form-group">
               <label for="email">メールアドレス(必須)</label>
               <input type="email" class="form-control" id="email" value="{{ $email }}" name="entry.813525685" required>
          </div>
          @if ($errors->has('message'))
          <p class="text-danger">{{$errors->first('message')}}</p>
          @endif
          <div class="form-group">
               <label for="message">お問い合わせ内容(必須)</label>
               <textarea class="form-control" id="message" rows="5" name="entry.395246871" required>{{ $message }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary" onclick="sendGform()">送信する</button>
     </form>
     <iframe name="dummyIframe" style="display:none;" onload="showThxMessage()"></iframe>
</div>
<div id="thxMessage" style="display:none;" class="text-center">お問い合わせありがとうございました。</div>
<script>
     function sendGform() {
          document.myForm.submit();
          document.getElementById('formWrapper').style.display = 'none';
          document.getElementById('thxMessage').style.display = 'block';
     }
</script>
@endsection