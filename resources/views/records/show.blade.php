@extends('layouts.app')

@section('content')
<div class="card post-menu-card col-sm-3">
     <nav class="post-menu">
          <a href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
          <a href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
          <a href="{{ route('users.show', Auth::user()->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
          <a href="{{ route('records.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034931/calendar_cplkec.svg">CALENDAR</a>
          <a href="{{ route('gallery.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034942/image_ckvyba.svg">GALLERY</a>
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
{{ $record->size }}<br>
{{ $record->sleep_item }}<br>
{{ $record->care_item1 }}<br>
{{ $record->care_item2 }}<br>
{{ $record->care_item3 }}<br>
{{ $record->care_item4 }}<br>
{{ $record->alcohol }}<br>
{{ $record->stress }}<br>
{{ $record->remarks }}<br>
{{ $record->created_at }}<br>
<img src="{{ $record->image_path }}" alt="画像" style="width:200px; height:200px;"><br>
<a href="{{ route('records.index') }}">戻る</a>
@if($record->user_id === Auth::id())
<a href="{{ route('records.edit', $record->id) }}">編集</a>
<form action="{{ route('records.destroy', $record->id) }}" method="POST">
     @method('DELETE')
     @csrf
     <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
</form>
@endif
@endsection