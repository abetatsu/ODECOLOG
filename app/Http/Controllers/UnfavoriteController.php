<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class UnfavoriteController extends Controller
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
        $post->dislikes()->attach(Auth::id());
        $count = $post->dislikes()->count();
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
        $post->dislikes()->detach(Auth::id());
        $count = $post->dislikes()->count();
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
    public function countUnfavorite($id)
    {
        $post = Post::find($id);
        $count = $post->dislikes()->count();

        return response()->json($count);
    }

    /**
     * check the boolean from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hasUnfavorite($id)
    {
        $post = Post::find($id);

        if($post->dislikes()->where('user_id', Auth::id())->exists()) {
            $result = true;
        } else {
            $result = false;
        }

        return response()->json($result);
    }
}
