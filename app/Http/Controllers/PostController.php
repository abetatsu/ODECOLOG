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

    public function ogp(Post $post)
    {
        // OGPのサイズ
        $w = 600;
        $h = 315;
        // １行の文字数
        $partLength = 10;

        $fontSize = 30;
        $fontPath = public_path('/assets/fonts/Roboto-Regular.ttf');

        // 画像を作成
        $image = \imagecreatetruecolor($w, $h);
        // 背景画像を描画
        if ($post->image_path) {
            $bg = \imagecreatefrompng($post->image_path);
        } else {
            $bg = \imagecreatefromjpeg(url('https://res.cloudinary.com/tatsu/image/upload/v1602546933/%E3%82%B9%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%B3%E3%82%B7%E3%83%A7%E3%83%83%E3%83%88_2020-10-13_8.55.04_fvpo4k.png'));
            // 色を作成
            $white = imagecolorallocate($image, 255, 255, 255);
            $grey = imagecolorallocate($image, 128, 128, 128);

            // 各行に分割
            $parts = [];
            $length = mb_strlen($post->title);
            for ($start = 0; $start < $length; $start += $partLength) {
                $parts[] = mb_substr($post->title, $start, $partLength);
            }

            // テキストの影を描画
            $this->drawParts($image, $parts, $w, $h, $fontSize, $fontPath, $grey, 3);
            // テキストを描画
            $this->drawParts($image, $parts, $w, $h, $fontSize, $fontPath, $white);
        }
        imagecopyresampled($image, $bg, 0, 0, 0, 0, $w, $h, 600, 315);

        ob_start();
        imagepng($image);
        $content = ob_get_clean();

        // 画像としてレスポンスを返す
        return response($content)
            ->header('Content-Type', 'image/png');
    }

    /**
     * 各行の描画メソッド
     */
    private function drawParts($image, $parts, $w, $h, $fontSize, $fontPath, $color, $offset = 0)
    {
        foreach ($parts as $i => $part) {
            // サイズを計算
            $box = \imagettfbbox($fontSize, 0, $fontPath, $part);
            $boxWidth = $box[4] - $box[6];
            $boxHeight = $box[1] - $box[7];
            // 位置を計算
            $x = ($w - $boxWidth) / 2;
            $y = $h / 2 + $boxHeight / 2 - $boxHeight * count($parts) * 0.5 + $boxHeight * $i;
            \imagettftext($image, $fontSize, 0, $x + $offset, $y + $offset, $color, $fontPath, $part);
        }
    }
}
