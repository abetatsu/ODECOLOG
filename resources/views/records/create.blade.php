@extends('layouts.app')

@section('content')
<form enctype="multipart/form-data" class="col-sm-6 mx-auto" method="POST" action="{{ route('records.store') }}">
     @csrf
     @foreach ($errors->all() as $error)
     <p class="text-center text-danger">{{ $error }}</p>
     @endforeach
     <div class="form-group">
          <label for="day">日付</label>
          <input type="date" class="form-controll" id="day" name="day" value="{{ $date }}">
          <small id="emailHelp" class="form-text text-muted">日付の入力は必須です</small>
     </div>
     <div class="form-group">
          <label for="image">画像</label>
          <input type="file" class="form-control-file" id="image" name="image">
          <small id="emailHelp" class="form-text text-muted">画像の投稿は必須です</small>
     </div>
     <div class="form-group">
          <label for="size">サイズ(眉山から生え際の長さ)</label>
          <select class="form-control" name="size" id="size">
               <option value="">選択してください</option>
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
     <small id="emailHelp" class="form-text text-muted">サイズの入力は必須です</small>
     <div class="form-group">
          <label for="sleep_time">睡眠時間(任意)</label>
          <select class="form-control" id="sleep_time" name="sleep_time">
               <option value="">選択してください</option>
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
     <div class="form-group">
          <label for="care_item1">ケア用品1(任意)</label>
          <input type="text" class="form-control" name="care_item1" id="care_item1" placeholder="使っているケア用品を入力してください">
     </div>
     <div class="form-group">
          <label for="care_item2">ケア用品2(任意)</label>
          <input type="text" class="form-control" name="care_item2" id="care_item2" placeholder="使っているケア用品を入力してください">
     </div>
     <div class="form-group">
          <label for="care_item3">ケア用品3(任意)</label>
          <input type="text" class="form-control" name="care_item3" id="care_item3" placeholder="使っているケア用品を入力してください">
     </div>
     <div class="form-group">
          <label for="care_item4">ケア用品4(任意)</label>
          <input type="text" class="form-control" name="care_item4" id="care_item4" placeholder="使っているケア用品を入力してください">
     </div>
     <div class="form-group">
          <label for="alcohol">飲酒量(任意)</label>
          <select class="form-control" id="alcohol" name="alcohol">
               <option value="">選択してください</option>
               <option value="1合（180ml）未満">1合（180ml）未満</option>
               <option value="1合以上2合（360ml）未満">1合以上2合（360ml）未満</option>
               <option value="2合以上3合（540ml）未満">2合以上3合（540ml）未満</option>
               <option value="3合以上4合（720ml）未満">3合以上4合（720ml）未満</option>
               <option value="4合以上5合（900ml）未満">4合以上5合（900ml）未満</option>
               <option value="5合（900ml）以上">5合（900ml）以上</option>
          </select>
     </div>
     <div class="form-group">
          <label for="stress">ストレス(任意)</label>
          <select class="form-control" id="stress" name="stress">
               <option value="">選択してください</option>
               <option value="ほぼない">ほぼない</option>
               <option value="少しある">少しある</option>
               <option value="ある">ある</option>
               <option value="強く感じる">強く感じる</option>
          </select>
     </div>
     <div class="form-group">
          <label for="remarks">備考(任意)</label>
          <textarea type="text" class="form-control" name="remarks" id="remarks" placeholder="メモしたいことがあれば入力してください" rows="4" cols="40">
          </textarea>
     </div>
     <button type="submit" class="btn btn-primary">登録する</button>
</form>
<a href="{{ route('records.index') }}">戻る</a>
@endsection