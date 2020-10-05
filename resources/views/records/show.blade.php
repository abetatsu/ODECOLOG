@extends('layouts.app')

@section('content')
@include('layouts.menu')
<div class="card col-sm-6 mx-auto my-5 profile-show">
     @if($record->user_id === Auth::id())
     <div class="dropdown dot-menu-record">
          <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601111215/options-horizontal_i4cub7.svg">
          </div>
          <div class="dropdown-menu dropdown-menu-bg" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item dot-menu-item text-muted btn btn-link post-show-edit" href="{{ route('records.edit', $record->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172995/edit_g4swwu.svg">EDIT</a>
               <label for="record-show-delete">
                    <form class="dropdown-item dot-menu-item text-muted" action="{{ route('records.destroy', $record->id) }}" method="POST">
                         @method('DELETE')
                         @csrf
                         <img src="https://res.cloudinary.com/tatsu/image/upload/v1601172993/delete_b1rjwi.svg"><input id="record-show-delete" class="btn btn-link" type="submit" value="DELETE" onclick='return confirm("削除しますか？");'>
                    </form>
               </label>
          </div>
     </div>
     @endif
     <div class="card-body col-xs-6">
          <p class="record-date text-muted">{{ $record->created_at->format('Y/m/d') }}</p>
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
                              <td class="text-center text-muted">サイズ</td>
                              <td class="text-center text-muted">{{ $record->size }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">睡眠時間</td>
                              <td class="text-center text-muted">{{ $record->sleep_time }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">ケア用品１</td>
                              <td class="text-center text-muted">{{ $record->care_item1 }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">ケア用品２</td>
                              <td class="text-center text-muted">{{ $record->care_item2 }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">ケア用品３</td>
                              <td class="text-center text-muted">{{ $record->care_item3 }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">ケア用品４</td>
                              <td class="text-center text-muted">{{ $record->care_item4 }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">アルコール摂取量</td>
                              <td class="text-center text-muted">{{ $record->alcohol }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">ストレス</td>
                              <td class="text-center text-muted">{{ $record->stress }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">備考</td>
                              <td class="text-center text-muted">{{ $record->remarks }}</td>
                         </tr>
                    </tbody>
               </table>
          </div>
     </div>
</div>
@endsection