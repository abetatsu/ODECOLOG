<nav class="navbar navbar-expand-md navbar-light">
     <div class="container title-name">
          <a class="navbar-brand text-muted" href="{{ url('/posts') }}">
               ODECOLOG
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
               <span class="navbar-toggler-icon">
               </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <!-- Left Side Of Navbar -->
               <ul class="navbar-nav mr-auto">
               </ul>
               <!-- Right Side Of Navbar -->
               <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                         <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                         <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item d-md-none post-menu">
                         <a class="text-muted {{ request()->is('*posts') ? 'active' : ''}}" href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
                    </li>
                    <li class="nav-item d-md-none post-menu">
                         <a class="text-muted {{ request()->is('*posts/create') ? 'active' : ''}}" href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
                    </li>
                    <li class="nav-item d-md-none post-menu">
                         <a class="text-muted {{ request()->is('*users/*') ? 'active' : ''}}" href="{{ route('users.show', Auth::user()->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
                    </li>
                    <li class="nav-item d-md-none post-menu">
                         <a class="text-muted {{ request()->is('*records') ? 'active' : ''}}" href="{{ route('records.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034931/calendar_cplkec.svg">CALENDAR</a>
                    </li>
                    <li class="nav-item d-md-none post-menu">
                         <a class="text-muted {{ request()->is('*photos') ? 'active' : ''}}" href="{{ route('photos.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034942/image_ckvyba.svg">GALLERY</a>
                    </li>
                    <li class="nav-item d-md-none post-menu">
                         <a class="text-muted pb-1 {{ request()->is('*questions/question') ? 'active' : ''}}" href="{{ route('questions.question') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1603594282/document-check_fcdeog.svg">DIAGNOSIS</a>
                    </li>
                    <li class="nav-item d-md-none post-menu">
                         <a class="text-muted" href="{{ route('terms.help') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601694212/circle-help_bt6r0s.svg">HELP</a>
                    </li>
                    <li class="nav-item d-md-none post-menu">
                         <a class="text-muted {{ request()->is('*contact') ? 'active' : ''}}" href="{{ url('contact') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601038055/email_iny45a.svg">CONTACT US</a>
                    </li>
                    <li class="nav-item d-md-none post-menu">
                         <label for="logout-menu1">
                              <form class="dot-menu-item text-muted logout-form-menu" action="{{ route('logout') }}" method="POST">
                                   @csrf
                                   <img src="https://res.cloudinary.com/tatsu/image/upload/v1601081054/log-out_gwkzdh.svg"><input class="btn btn-link" type="submit" value="LOG-OUT" onclick='return confirm("ログアウトしますか？");'>
                              </form>
                         </label>
                    </li>
                    @endguest
               </ul>
          </div>
     </div>
</nav>
