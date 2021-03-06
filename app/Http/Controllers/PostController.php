<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
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
        $posts = Post::orderBy('id', 'desc')->paginate(10);
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
     * @param  \App\Http\Requests\PostRequest  $request
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
                'width' => 600,
                'height' => 500
            ]);
            $post->image_path = $logoUrl;
            $post->public_id = $publicId;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success_message', '記事が投稿されました');
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

        if (Auth::id() !== $post->user_id) {
            return abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $user = Auth::id();

        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->url;

        if ($image = $request->file('image')) {
            if (isset($post->public_id)) {
                Cloudder::destroyImage($post->public_id);
            }
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width' => 600,
                'height' => 500
            ]);
            $post->image_path = $logoUrl;
            $post->public_id = $publicId;
        }

        $post->save();

        return redirect()->route('posts.show', compact('post'))->with('success_message', '記事が編集されました');
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

        if (Auth::id() !== $post->user_id) {
            return abort(403);
        }

        if (isset($post->public_id)) {
            Cloudder::destroyImage($post->public_id);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success_message', '投稿が削除されました');
    }
}
