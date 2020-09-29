@extends('layouts.app')

@section('content')
<div class="card post-menu-card col-sm-3">
     <nav class="post-menu">
          <a href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
          <a href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
          <a href="{{ route('users.show', Auth::user()->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
          <a href="{{ route('records.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034931/calendar_cplkec.svg">CALENDAR</a>
          <a href="{{ route('photos.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034942/image_ckvyba.svg">GALLERY</a>
          <a href="{{ url('contact') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601038055/email_iny45a.svg">CONTACT US</a>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601081054/log-out_gwkzdh.svg">LOG-OUT
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
          </form>
     </nav>
</div>
<div class="card col-sm-6 mx-auto my-5 profile-show">
     @if($record->user_id === Auth::id())
     <div class="dropdown dot-menu">
          <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601111215/options-horizontal_i4cub7.svg">
          </div>
          <div class="dropdown-menu dropdown-menu-bg" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item dot-menu-item" href="{{ route('records.edit', $record->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172995/edit_g4swwu.svg">EDIT</a>
               <a class="dropdown-item dot-menu-item" onclick="event.preventDefault();
                                                  document.getElementById('delete-post').submit();"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172993/delete_b1rjwi.svg">DELETE</a>
               <form id="delete-post" action="{{ route('records.destroy', $record->id) }}" method="POST" style="display:none;">
                    @method('DELETE')
                    @csrf
               </form>
          </div>
     </div>
     @endif
     <div class="card-body col-xs-6">
          <p class="record-date">{{ $record->created_at->format('Y/m/d') }}</p>
          <img src="{{ $record->image_path }}" alt="画像" class="record-image">
          <div class="record-data">
               <table class="table record-table">
                    <thead>
                         <tr>
                              <th class="text-center">項目</th>
                              <th class="text-center">記録</th>
                         </tr>
                    </thead>
                    <tbody>
                         <tr>
                              <td class="text-center">サイズ</td>
                              <td class="text-center">{{ $record->size }}</td>
                         </tr>
                         <tr>
                              <td class="text-center">睡眠時間</td>
                              <td class="text-center">{{ $record->sleep_time }}</td>
                         </tr>
                         <tr>
                              <td class="text-center">ケア用品１</td>
                              <td class="text-center">{{ $record->care_item1 }}</td>
                         </tr>
                         <tr>
                              <td class="text-center">ケア用品２</td>
                              <td class="text-center">{{ $record->care_item2 }}</td>
                         </tr>
                         <tr>
                              <td class="text-center">ケア用品３</td>
                              <td class="text-center">{{ $record->care_item3 }}</td>
                         </tr>
                         <tr>
                              <td class="text-center">ケア用品４</td>
                              <td class="text-center">{{ $record->care_item4 }}</td>
                         </tr>
                         <tr>
                              <td class="text-center">アルコール摂取量</td>
                              <td class="text-center">{{ $record->alcohol }}</td>
                         </tr>
                         <tr>
                              <td class="text-center">ストレス</td>
                              <td class="text-center">{{ $record->stress }}</td>
                         </tr>
                         <tr>
                              <td class="text-center">備考</td>
                              <td class="text-center">{{ $record->remarks }}</td>
                         </tr>
                    </tbody>
               </table>
          </div>
     </div>
</div>
@endsection