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
<img src="{{ $record->image_path }}" alt="画像" style="width:200px; height:200px;"><br>
<a href="{{ route('records.index') }}">戻る</a>
<a href="{{ route('records.edit', $record->id) }}">編集</a>
<form action="{{ route('records.destroy', $record->id) }}" method="POST">
     @method('DELETE')
     @csrf
     <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
</form>
@endsection