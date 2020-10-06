<div class="card card-post col-md-6 my-5 mx-auto">
     <div class="dot-menu-show">
          @if($post->user_id === Auth::id())
               @include('layouts._dot-menu', [
                    'id' => $post->id,
                    'editRoute' => 'posts.edit',
                    'deleteRoute' => 'posts.destroy',
               ])
          @endif
     </div>
     <div class="post-top">
          <a href="{{ route('users.show', $post->user->id) }}" class="post-profiles">
               @if(empty($post->user->image_path))
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601430063/noImage_iplfhh.png" alt="プロフィール画像" class="post-profile">
               @else
                    <img src="{{ $post->user->image_path }}" alt="プロフィール画像" class="post-profile">
               @endif
          </a>
          <a href="{{ route('users.show', $post->user->id) }}" class="post-profile-name text-muted">{{ $post->user->name }}</a>
          <p class="post-profiles text-muted">{{ $post->created_at->diffForHumans(Carbon\Carbon::now()) }}</p>
     </div>
     <h2 class="post-title">
          <a href="{{ route('posts.show', $post->id) }}" class="text-muted">
               『{{ $post->title }}』
          </a>
     </h2>
     <div class="card-body">
          <p class="card-text text-muted">{{ $post->getAbstract() }} <a href="{{ route('posts.show', $post->id) }}" class="text-muted">続きをみる</a></p>
     </div>
     @if(isset($post->image_path))
          <img src="{{ $post->image_path }}" alt="画像" class="post-image mx-auto">
     @endif
     <hr>
     <div class="row pb-3">
          <div class="col-4 post-icon">
               <like-component :post="{{ json_encode($post) }}"></like-component>
          </div>
          <div class="col-4 post-icon">
               <dislike-component :post="{{ json_encode($post) }}"></dislike-component>
          </div>
          <div class="col-4 post-icon">
               <a href="{{ route('posts.show', $post->id) }}#comment" class="text-muted comment-icon"><i class="fas fa-comments"></i> {{ count($post->comments) }}</a>
          </div>
     </div>
</div>
