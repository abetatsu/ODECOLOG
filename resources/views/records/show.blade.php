@extends('layouts.app')

@section('content')
@include('layouts.menu')
<div class="card col-md-6 mx-auto my-5 profile-show">
     @if($record->user_id === Auth::id())
     <div class="dot-menu-record">
          @include('layouts._dot-menu', [
               'id' => $record->id,
               'editRoute' => 'records.edit',
               'deleteRoute' => 'records.destroy',
          ])
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