<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts._head')
<body>
    <div id="app">
        @include('layouts._nav')
        <main class="py-4">
            @include('layouts.flash')
            @yield('content')
        </main>
        @include('layouts._footer')
    </div>
</body>
</html>
