@extends('layouts.app')
@section('content')
@include('layouts.menu')
@if($records->isEmpty())
<div class="my-5 col-md-8 slider-photo">
     <img src="https://res.cloudinary.com/tatsu/image/upload/v1601434834/humaaans_1_s4bm6w.png" class="gallery-photos">
     <p class="text-center">記録された写真がありません</p>
</div>
@else
<div class="my-5 col-md-8 slider-photo">
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