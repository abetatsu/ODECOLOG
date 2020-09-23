@extends('layouts.app')

@section('content')
<h1 class="text-center">お問い合わせフォーム</h1>

<form action="{{ route('confirm') }}" method="post" class="mx-auto col-sm-6">
     @csrf
     @if ($errors->has('name'))
     <p class="text-danger">{{$errors->first('name')}}</p>
     @endif
     <div class="form-group">
          <label for="name">お名前(必須)</label>
          <input type="text" class="form-control" id="name" placeholder="" value="{{ old('name') }}" name="name">
     </div>
     @if ($errors->has('email'))
     <p class="text-danger">{{$errors->first('email')}}</p>
     @endif
     <div class="form-group">
          <label for="email">メールアドレス(必須)</label>
          <input type="email" class="form-control" id="email" placeholder="" value="{{ old('email') }}" name="email">
     </div>
     @if ($errors->has('message'))
     <p class="text-danger">{{$errors->first('message')}}</p>
     @endif
     <div class="form-group">
          <label for="message">お問い合わせ内容(必須)</label>
          <textarea class="form-control" id="message" rows="5" name="message">{{ old('message') }}</textarea>
     </div>
     <button type="submit" class="btn btn-primary">確認画面へ</button>
</form>
@endsection