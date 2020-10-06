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
    </div>
</body>

@include('layouts._footer')

</html>
