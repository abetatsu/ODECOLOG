@extends('layouts.app')

@section('content')
@include('layouts.menu')
@foreach($posts as $post)
@include('posts._card')
@endforeach
<div class="row justify-content-center">{{ $posts->links() }}</div>
@endsection