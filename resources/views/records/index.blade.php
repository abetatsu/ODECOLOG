@extends('layouts.app')
@section('content')
@include('layouts.menu')
<div class="col-md-8 my-5 calendar-index">
{!! $calendar !!}
<div>
@endsection
