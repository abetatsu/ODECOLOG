<div class="card post-menu-card col-md-3">
     <nav class="post-menu">
          <a class="text-muted pb-1 {{ request()->is('*posts') ? 'active' : ''}}" href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
          <a class="text-muted pb-1 {{ request()->is('*posts/create') ? 'active' : ''}}" href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
          <a class="text-muted pb-1 {{ request()->is('*users/*') ? 'active' : ''}}" href="{{ route('users.show', Auth::id()) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
          <a class="text-muted pb-1 {{ request()->is('*records') ? 'active' : ''}}" href="{{ route('records.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034931/calendar_cplkec.svg">CALENDAR</a>
          <a class="text-muted pb-1 {{ request()->is('*photos') ? 'active' : ''}}" href="{{ route('photos.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034942/image_ckvyba.svg">GALLERY</a>
          <a class="text-muted pb-1 {{ request()->is('*terms/help') ? 'active' : ''}}" href="{{ route('terms.help') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601694212/circle-help_bt6r0s.svg">HELP</a>
          <a class="text-muted pb-1 {{ request()->is('*contact') ? 'active' : ''}}" href="{{ url('contact',$is_production) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601038055/email_iny45a.svg">CONTACT US</a>
          <label for="logout-menu1">
               <form class="dot-menu-item text-muted pb-1 logout-form-menu" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601081054/log-out_gwkzdh.svg"><input class="btn btn-link" type="submit" value="LOG-OUT" onclick='return confirm("ログアウトしますか？");'>
               </form>
          </label>
     </nav>
</div>
