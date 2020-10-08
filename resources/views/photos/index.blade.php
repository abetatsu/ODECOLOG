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
<swiper-component
     :records="{{ json_encode($records) }}"
></swiper-component>
</div>
@endif
@endsection