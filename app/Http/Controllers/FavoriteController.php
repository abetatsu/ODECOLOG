<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Post;
use Auth;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $post = Post::find($id);
        $post->likes()->attach(Auth::id());
        $count = $post->likes()->count();
        $result = true;
        return response()->json([
            'result' => $result,
            'count' => $count,
        ]);
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
        $post->likes()->detach(Auth::id());
        $count = $post->likes()->count();
        $result = false;
        return response()->json([
            'result' => $result,
            'count' => $count,
        ]);
    }

    /**
     * Count the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function countFavorite($id)
    {
        $post = Post::find($id);
        $count = $post->likes()->count();

        return response()->json($count);
    }

    /**
     * Search the boolean from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hasFavorite($id)
    {
        $post = Post::find($id);

        if ($post->likes()->where('user_id', Auth::id())->exists()) {
            $result = true;
        } else {
            $result = false;
        }
        return response()->json($result);
    }
}
