@extends('layouts.app')

@section('content')
<div class="card post-menu-card col-sm-3">
     <nav class="post-menu">
          <a class="text-muted" href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
          <a class="text-muted" href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
          <a class="text-muted" href="{{ route('users.show', Auth::user()->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
          <a class="text-muted" href="{{ route('records.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034931/calendar_cplkec.svg">CALENDAR</a>
          <a class="text-muted" href="{{ route('photos.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034942/image_ckvyba.svg">GALLERY</a>
          <a class="text-muted" href="{{ route('terms.help') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601694212/circle-help_bt6r0s.svg">HELP</a>
          <a class="text-muted" href="{{ url('contact') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601038055/email_iny45a.svg">CONTACT US</a>
          <label for="logout-menu5">
               <form class="dot-menu-item text-muted logout-form-menu" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601081054/log-out_gwkzdh.svg"><input id="logout-menu5" class="btn btn-link" type="submit" value="LOG-OUT" onclick='return confirm("ログアウトしますか？");'>
               </form>
          </label>
     </nav>
</div>
<form enctype="multipart/form-data" class="col-sm-6 mx-auto my-5 form-wrap" method="POST" action="{{ route('records.store') }}">
     @csrf
     <h2 class="text-center text-muted">記録作成フォーム</h2>
     <p class="text-center text-muted mt-4 form-sub-text">おでこが後退してきているのか記録を残して確認しましょう。</p>
     <p class="text-center text-muted form-sub-text">使っているものがあれば一緒に記録することで効果を可視化できますね。</p>
     <p class="text-center text-muted form-sub-text">写真は同じ角度からの写真を撮り続けることで変化が分かりやすくなります。</p>
     <p class="text-center text-muted form-sub-bottom">継続は力なりです。</p>
     @if ($errors->any())
     @foreach ($errors->all() as $error)
     <p class="text-center text-danger">{{ $error }}</p>
     <p class="text-center text-danger">画像を選択された方は、恐れ入りますが再度画像を選択してください。</p>
     @endforeach
     @endif
     <div class="form-group text-muted">
          <label for="day">日付</label><small class="d-inline-block ml-3 text-muted">日付の入力は必須です</small><br>
          <input type="date" class="form-controll" id="day" name="day" value="{{ $date }}">
     </div>
     <div class="form-group text-muted">
          <label for="image">おでこの画像</label><small class="d-inline-block ml-3 text-muted">画像の投稿は必須です</small>
          <input type="file" class="form-control-file" id="image" name="image">
     </div>
     <div class="form-group text-muted">
          <label for="size">サイズ(眉山から生え際の長さ)</label>
          <small class="form-text text-muted">サイズの入力は必須です</small>
          <select class="form-control" name="size" id="size">
               @if(!empty(old('size')))
               <option value="{{ old('size') }}">{{ old('size') }}</option>
               @endif
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
     <div class="form-group text-muted">
          <label for="sleep_time">睡眠時間(任意)</label>
          <select class="form-control" id="sleep_time" name="sleep_time">
               @if(!empty(old('sleep_time')))
               <option value="{{ old('sleep_time') }}">{{ old('sleep_time') }}</option>
               @endif
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
               @if(!empty(old('stress')))
               <option value="{{ old('stress') }}">{{ old('stress') }}</option>
               @endif
               <option value="">選択してください</option>
               <option value="ほぼない">ほぼない</option>
               <option value="少しある">少しある</option>
               <option value="ある">ある</option>
               <option value="強く感じる">強く感じる</option>
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
