<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use Auth;
use JD\Cloudder\Facades\Cloudder;
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $now = Carbon::now();

        foreach($posts as $post)
        {
            $date = $post->updated_at;
            if($now->isSameDay($date))
            {
                $diffHours = $now->diffInHours($date);

                if($diffHours < 1)
                {
                    $diffMinutes = $now->diffInMinutes($date);

                    if($diffMinutes < 60)
                    {
                        $diffSeconds = $now->diffInSeconds($date);
                    }
                }

            } elseif($now->isSameMonth($date, true)){
                $diffDays = $now->diffInDays();
            } elseif($now->isSameYear($date)) {
                $diffMonths = $now->diffInMonths();
            } else {
                $diffYears = $now->diffInYears();
            }

        }

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->url;
        $post->user_id = Auth::id();

        if ($image = $request->file('image')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width' => 200,
                'height' => 200
            ]);
            $post->image_path = $logoUrl;
            $post->public_id = $publicId;
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $post->load('user', 'comments');

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if(Auth::id() !== $post->user_id) {
            return abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->url;

        if ($image = $request->file('image')) {
            if(isset($post->public_id)){
                Cloudder::destroyImage($post->public_id);
            }
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width' => 200,
                'height' => 200
            ]);
            $post->image_path = $logoUrl;
            $post->public_id = $publicId;
        }

        $post->save();

        return view('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(Auth::id() !== $post->user_id) {
            return abort(403);
        }

        if(isset($post->public_id)) {
            Cloudder::destroyImage($post->public_id);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('flash_message', '投稿が削除されました');
    }
}
