@extends('layouts.app')

@section('content')
@include('layouts.menu')
<form enctype="multipart/form-data" class="col-md-6 mx-auto my-5 form-wrap" method="POST" action="{{ route('records.update', $record->id) }}">
     @csrf
     @method('PUT')
     <h2 class="text-center text-muted">記録編集フォーム</h2>
     @include('layouts.error')
     <div class="form-group text-muted">
          <label for="day">日付</label><small class="d-inline-block ml-3 text-muted">日付の入力は必須です</small><br>
          <input type="date" class="form-controll" id="day" name="day" value="{{ $record->day }}">
     </div>
     <div class="form-group text-muted">
          <label for="image">画像</label><small class="d-inline-block ml-3 text-muted">画像の投稿は必須です</small>
          <input type="file" class="form-control-file" id="image" name="image">
          <img src="{{ $record->image_path }}" alt="画像" class="form-image">
     </div>
     <div class="form-group text-muted">
          <label for="size">サイズ(眉山から生え際までの長さ)</label><small class="d-inline-block ml-3 text-muted">サイズの入力は必須です</small>
          <select class="form-control" name="size" id="size">
               @if(!empty($record->size))
               <option value="{{ $record->size }}" selected>{{ $record->size }}</option>
               @else
               <option value="">選択してください</option>
               @endif
               @foreach(config('foreheadSize') as $option)
               <option value="{{ $option }}">{{ $option }}</option>
               @endforeach
          </select>
     </div>
     <div class="form-group text-muted">
          <label for="sleep_time">睡眠時間(任意)</label>
          <select class="form-control" id="sleep_time" name="sleep_time">
               @if(!empty($record->sleep_time))
               <option value="{{ $record->sleep_time }}" selected>{{ $record->sleep_time }}</option>
               @else
               <option value="">選択してください</option>
               @endif
               @foreach(config('sleepTime') as $sleepTime)
               <option value="{{ $sleepTime }}">{{ $sleepTime }}</option>
               @endforeach
          </select>
     </div>
     <div class="form-group text-muted">
          <label for="care_item1">ケア用品1(任意)</label>
          <input type="text" class="form-control" name="care_item1" id="care_item1" value="{{ $record->care_item1 }}">
     </div>
     <div class="form-group text-muted">
          <label for="care_item2">ケア用品2(任意)</label>
          <input type="text" class="form-control" name="care_item2" id="care_item2" value="{{ $record->care_item2 }}">
     </div>
     <div class="form-group text-muted">
          <label for="care_item3">ケア用品3(任意)</label>
          <input type="text" class="form-control" name="care_item3" id="care_item3" value="{{ $record->care_item3 }}">
     </div>
     <div class="form-group text-muted">
          <label for="care_item4">ケア用品4(任意)</label>
          <input type="text" class="form-control" name="care_item4" id="care_item4" value="{{ $record->care_item4 }}">
     </div>
     <div class="form-group text-muted">
          <label for="alcohol">飲酒量(任意)</label>
          <select class="form-control" id="alcohol" name="alcohol">
               @if(!empty($record->alcohol))
               <option value="{{ $record->alcohol }}" selected>{{ $record->alcohol }}</option>
               @else
               <option value="">選択してください</option>
               @endif
               @foreach(config('alcohol') as $drinkAlcohol)
               <option value="{{ $drinkAlcohol }}">{{ $drinkAlcohol }}</option>
               @endforeach
          </select>
     </div>
     <div class="form-group text-muted">
          <label for="stress">ストレス(任意)</label>
          <select class="form-control" id="stress" name="stress">
               @if(!empty($record->stress))
               <option value="{{ $record->stress }}" selected>{{ $record->stress }}</option>
               @else
               <option value="">選択してください</option>
               @endif
               @foreach(config('stress') as $stress)
               <option value="{{ $stress }}">{{ $stress }}</option>
               @endforeach
          </select>
     </div>
     <div class="form-group text-muted">
          <label for="remarks">備考(任意)</label>
          <textarea type="text" class="form-control" name="remarks" id="remarks" rows="4" cols="40">{{ $record->remarks }}
          </textarea>
     </div>
     <button type="submit" class="login-button text-muted">登録する</button>
</form>
@endsection
