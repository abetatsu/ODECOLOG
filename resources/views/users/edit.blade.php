@extends('layouts.app')

@section('content')
@include('layouts.menu')
<form enctype="multipart/form-data" class="col-md-6 mx-auto my-5 form-wrap" method="POST" action="{{ route('users.update', $user->id) }}">
     @method('PUT')
     @csrf
     <h2 class="text-center text-muted">ユーザー情報編集フォーム</h2>
     <div class="form-group text-muted">
          <label for="image">画像</label>
          <input type="file" class="form-control-file" id="image" name="image">
          <img src="{{ $user->image_path }}" class="form-image">
     </div>
     @include('layouts.error')
     @include('layouts.fileError')
     <div class="form-group text-muted">
          <label for="name">名前</label><small class="d-inline-block ml-3 text-muted">名前の入力は必須です</small>
          <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
     </div>
     <div class="form-group text-muted">
          <label for="age">年齢</label>
          <select class="form-control" name="age" id="age">
               @if(!empty($user->age))
               <option value="{{ $user->age }}" selected>{{ $user->age }}</option>
               @else
               <option value="">選択してください</option>
               @endif
               @foreach(config('age') as $age)
                    <option value="{{ $age }}">{{ $age }}</option>
               @endforeach
          </select>
     </div>
     <div class="form-group text-muted">
          <label for="job">職業</label>
          <select class="form-control" id="job" name="job">
               @if(!empty($user->job))
               <option value="{{ $user->job }}" selected>{{ $user->job }}</option>
               @else
               <option value="">選択してください</option>
               @endif
               @foreach(config('job') as $job)
                    <option value="{{ $job }}">{{ $job }}</option>
               @endforeach
          </select>
     </div>
     <button type="submit" class="login-button text-muted">更新する</button>
</form>
@endsection
