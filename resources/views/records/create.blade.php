@extends('layouts.app')

@section('content')
@include('layouts.menu')
<form enctype="multipart/form-data" class="col-md-6 mx-auto my-5 form-wrap" method="POST" action="{{ route('records.store') }}">
     @csrf
     <h2 class="text-center text-muted">記録作成フォーム</h2>
     <p class="text-center text-muted mt-4 form-sub-text">おでこが後退してきているのか記録を残して確認しましょう。</p>
     <p class="text-center text-muted form-sub-text">使っているものがあれば一緒に記録することで効果を可視化できますね。</p>
     <p class="text-center text-muted form-sub-text">写真は同じ角度からの写真を撮り続けることで変化が分かりやすくなります。</p>
     <p class="text-center text-muted form-sub-bottom">継続は力なりです。</p>
     @include('layouts.error')
     @include('layouts.fileError')
     <div class="form-group text-muted">
          <label for="day">日付</label><small class="d-inline-block ml-3 text-muted">日付の入力は必須です</small><br>
          <input type="date" class="form-controll" id="day" name="day" value="{{ $date }}">
     </div>
     <div class="form-group text-muted">
          <label for="image">おでこの画像</label><small class="d-inline-block ml-3 text-muted">画像の投稿は必須です</small>
          <input type="file" class="form-control-file" id="image" name="image">
     </div>
     <div class="form-group text-muted">
          <label for="size">サイズ(眉山から生え際の長さ)</label><small class="d-inline-block ml-3 text-muted">サイズの入力は必須です</small>
          <select class="form-control" name="size" id="size">
               @if(!empty(old('size')))
               <option value="{{ old('size') }}">{{ old('size') }}</option>
               @endif
               <option value="">選択してください</option>
               @foreach(config('foreheadSize') as $foreheadSize)
               <option value="{{ $foreheadSize }}">{{ $foreheadSize }}</option>
               @endforeach
          </select>
     </div>
     <div class="form-group text-muted">
          <label for="sleep_time">睡眠時間(任意)</label>
          <select class="form-control" id="sleep_time" name="sleep_time">
               @if(!empty(old('sleep_time')))
               <option value="{{ old('sleep_time') }}">{{ old('sleep_time') }}</option>
               @endif
               <option value="">選択してください</option>
               @foreach(config('sleepTime') as $sleepTime)
               <option value="{{ $sleepTime }}">{{ $sleepTime }}</option>
               @endforeach
          </select>
     </div>
     <div class="form-group text-muted">
          <label for="care_item1">ケア用品1(任意)</label>
          <input type="text" class="form-control" name="care_item1" id="care_item1" placeholder="使っているケア用品を入力してください" value="{{ old('care_item1') }}">
     </div>
     <div class="form-group text-muted">
          <label for="care_item2">ケア用品2(任意)</label>
          <input type="text" class="form-control" name="care_item2" id="care_item2" placeholder="使っているケア用品を入力してください" value="{{ old('care_item2') }}">
     </div>
     <div class="form-group text-muted">
          <label for="care_item3">ケア用品3(任意)</label>
          <input type="text" class="form-control" name="care_item3" id="care_item3" placeholder="使っているケア用品を入力してください" value="{{ old('care_item3') }}">
     </div>
     <div class="form-group text-muted">
          <label for="care_item4">ケア用品4(任意)</label>
          <input type="text" class="form-control" name="care_item4" id="care_item4" placeholder="使っているケア用品を入力してください" value="{{ old('care_item4') }}">
     </div>
     <div class="form-group text-muted">
          <label for="alcohol">飲酒量(任意)</label>
          <select class="form-control" id="alcohol" name="alcohol">
               @if(!empty(old('alcohol')))
               <option value="{{ old('alcohol') }}">{{ old('alcohol') }}</option>
               @endif
               <option value="">選択してください</option>
               @foreach(config('alcohol') as $drinkAlcohol)
               <option value="{{ $drinkAlcohol }}">{{ $drinkAlcohol }}</option>
               @endforeach
          </select>
     </div>
     <div class="form-group text-muted">
          <label for="stress">ストレス(任意)</label>
          <select class="form-control" id="stress" name="stress">
               @if(!empty(old('stress')))
               <option value="{{ old('stress') }}">{{ old('stress') }}</option>
               @endif
               @foreach(config('stress') as $stress)
               <option value="{{ $stress }}">{{ $stress }}</option>
               @endforeach
          </select>
     </div>
     <div class="form-group text-muted">
          <label for="remarks">備考(任意)</label>
          <textarea type="text" class="form-control" name="remarks" id="remarks" placeholder="メモしたいことがあれば入力してください" rows="4" cols="40">{{ old('remarks') }}
          </textarea>
     </div>
     <button type="submit" class="login-button text-muted">登録する</button>
</form>
@endsection
