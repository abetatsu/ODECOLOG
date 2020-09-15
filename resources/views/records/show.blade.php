@extends('layouts.app')

@section('content')
{{ $record->size }}<br>
{{ $record->sleep_item }}<br>
{{ $record->care_item1 }}<br>
{{ $record->care_item2 }}<br>
{{ $record->care_item3 }}<br>
{{ $record->care_item4 }}<br>
{{ $record->alcohol }}<br>
{{ $record->stress }}<br>
{{ $record->remarks }}<br>
{{ $record->created_at }}<br>
<img src="{{ $record->image_path }}" alt="画像"><br>
<a href="{{ route('records.index') }}">戻る</a>

@endsection