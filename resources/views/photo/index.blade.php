<!DOCTYPE html>
<html lang="ja">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="{{ asset('/js/app.js') }}" defer></script>
</head>

<body>
     <a href="{{ route('records.index') }}">戻る</a>
     <!-- Slider main container -->
     <div class="swiper-container" style="width:1000px; height:500px;">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
               <!-- Slides -->
               @foreach($records as $record)
               <div class="swiper-slide">
                    <img src="{{ $record->image_path }}" style="background-position:center; width:1000px; height:500px;">
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
</body>

</html>