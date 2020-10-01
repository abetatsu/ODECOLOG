@extends('layouts.app')
@section('content')
<div class="card post-menu-card col-sm-3">
     <nav class="post-menu">
          <a class="text-muted" href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
          <a class="text-muted" href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
          <a class="text-muted" href="{{ route('users.show', Auth::user()->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
          <a class="text-muted" href="{{ route('records.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034931/calendar_cplkec.svg">CALENDAR</a>
          <a class="text-muted" href="{{ route('photos.index') }}" style="border-bottom:#6c757d solid 1px;"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034942/image_ckvyba.svg">GALLERY</a>
          <a class="text-muted" href="{{ url('contact') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601038055/email_iny45a.svg">CONTACT US</a>
          <a class="text-muted" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601081054/log-out_gwkzdh.svg">LOG-OUT
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
          </form>
     </nav>
</div>
@if($records->isEmpty())
<div class="my-5 col-sm-8 slider-photo">
     <img src="https://res.cloudinary.com/tatsu/image/upload/v1601434834/humaaans_1_s4bm6w.png" class="gallery-photos">
     <p class="text-center">記録された写真がありません</p>
</div>
@else
<div class="my-5 col-sm-8 slider-photo">
     <!-- Slider main container -->
     <div class="swiper-container">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
               <!-- Slides -->
               @foreach($records as $record)
               <div class="swiper-slide">
                    <img src="{{ $record->image_path }}" class="gallery-photos">
               </div>
               @endforeach
          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>

          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

          <!-- If we need scrollbar -->
          <div class="swiper-scrollbar"></div>
     </div>
</div>
@endif
@endsection