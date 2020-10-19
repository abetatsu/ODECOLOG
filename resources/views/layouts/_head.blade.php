<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>ODECOLOG</title>

     <!-- Global site tag (gtag.js) - Google Analytics -->
     @if(env('APP_ENV') === 'production')
     <script async src="https://www.googletagmanager.com/gtag/js?id={{env('GA_ID')}}"></script>
     <script>
          window.dataLayer = window.dataLayer || [];

          function gtag() {
               dataLayer.push(arguments);
          }
          gtag('js', new Date());

          gtag('config', '{{env("GA_ID")}}');
     </script>
     @endif

     @include('layouts.ogp-meta')

     <!-- Scripts -->
     <script src="{{ secure_asset('js/app.js') }}" defer></script>

     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

     <!-- Styles -->
     <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">

     <link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('image/apple-touch-icon.png') }}">
     <link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('image/favicon-32x32.png') }}">
     <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('image/favicon-16x16.png') }}">
     <link rel="manifest" href="{{ secure_asset('image/site.webmanifest') }}">
     <link rel="mask-icon" href="{{ secure_asset('image/safari-pinned-tab.svg') }}" color="#5bbad5">
     <meta name="msapplication-TileColor" content="#da532c">
     <meta name="theme-color" content="#ffffff">
</head>
