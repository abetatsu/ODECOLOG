<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Post;
use Auth;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $post = Post::find($request->post_id);

        $comment = new Comment;

        $comment->comment = $request->comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;


        $comment->save();

        return redirect()->route('posts.show', compact('post'))->with('success_message', 'コメントが投稿されました');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $post = Post::find($comment->post_id);

        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->comment = $request->comment;

        $comment->save();

        $post->load('user', 'comments');

        return redirect()->route('posts.show', compact('post'))->with('success_message', 'コメントが編集されました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $comment_id $post_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment_id, $post_id)
    {

        $comment = Comment::find($comment_id);

        if(Auth::id() !== $comment->user_id) {
            return abort(403);
        }

        $comment->delete();

        $post = Post::find($post_id);

        return redirect()->route('posts.show', compact('post'))->with('success_message', 'コメントが削除されました');
    }
}
