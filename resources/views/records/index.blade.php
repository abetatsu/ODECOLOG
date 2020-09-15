@extends('layouts.app')

@section('content')
@foreach($records as $record)
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
<img src="{{ $record->image_path }}" alt="画像">
<a href="{{ route('records.show', $record->id) }}">詳細</a><br>
@endforeach
<br>
<a href="{{ route('records.create') }}">投稿する</a>
@endsection