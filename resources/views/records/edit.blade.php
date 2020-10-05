@extends('layouts.app')

@section('content')
@include('layouts.menu')
<form enctype="multipart/form-data" class="col-md-6 mx-auto my-5 form-wrap" method="POST" action="{{ route('records.update', $record->id) }}">
     @csrf
     @method('PUT')
     <h2 class="text-center text-muted">記録編集フォーム</h2>
     @if ($errors->any())
     @foreach ($errors->all() as $error)
     <p class="text-center text-danger">{{ $error }}</p>
     <p class="text-center text-danger">画像を選択された方は、恐れ入りますが再度画像を選択してください。</p>
     @endforeach
     @endif
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
               <option value="指1本">指1本</option>
               <option value="指2本">指2本</option>
               <option value="指3本">指3本</option>
               <option value="指4本">指4本</option>
               <option value="指5本">指5本</option>
               <option value="1cm">1cm</option>
               <option value="2cm">2cm</option>
               <option value="3cm">3cm</option>
               <option value="4cm">4cm</option>
               <option value="5cm">5cm</option>
               <option value="6cm">6cm</option>
               <option value="7cm">7cm</option>
               <option value="8cm">8cm</option>
               <option value="9cm">9cm</option>
               <option value="10cm">10cm</option>
               <option value="11cm">11cm</option>
               <option value="12cm">12cm</option>
               <option value="13cm">13cm</option>
               <option value="14cm">14cm</option>
               <option value="15cm">15cm</option>
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
               <option value="1時間">1時間</option>
               <option value="2時間">2時間</option>
               <option value="3時間">３時間</option>
               <option value="4時間">4時間</option>
               <option value="5時間">5時間</option>
               <option value="6時間">6時間</option>
               <option value="7時間">7時間</option>
               <option value="8時間">8時間</option>
               <option value="9時間">9時間</option>
               <option value="10時間">10時間</option>
               <option value="11時間以上">11時間以上</option>
               <option value="1時間未満">1時間未満</option>
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
               <option value="1合（180ml）未満">1合（180ml）未満</option>
               <option value="1合以上2合（360ml）未満">1合以上2合（360ml）未満</option>
               <option value="2合以上3合（540ml）未満">2合以上3合（540ml）未満</option>
               <option value="3合以上4合（720ml）未満">3合以上4合（720ml）未満</option>
               <option value="4合以上5合（900ml）未満">4合以上5合（900ml）未満</option>
               <option value="5合（900ml）以上">5合（900ml）以上</option>
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
               <option value="ほぼない">ほぼない</option>
               <option value="少しある">少しある</option>
               <option value="ある">ある</option>
               <option value="強く感じる">強く感じる</option>
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
