<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\User;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Requests\UserRequest;
use App\Post;
use App\Record;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id', $user->id)->paginate(10);

        return view('users.show', compact('user', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if(Auth::id() !== $user->id) {
            return abort(403);
        }

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->age = $request->age;
        $user->job = $request->job;

        if ($image = $request->file('image')) {
            if(isset($user->public_id)){
                Cloudder::destroyImage($user->public_id);
            }
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width' => 200,
                'height' => 200
            ]);
            $user->image_path = $logoUrl;
            $user->public_id = $publicId;
        }

        $user->save();

        $posts = Post::where('user_id', $user->id)->paginate(10);

        return redirect()->route('users.show', compact('user', 'posts'))->with('success_message', 'ユーザー情報が変更されました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $record = Record::where('user_id', $user->id)->get();
        $post = Post::where('user_id', $user->id)->get();
        $pluckedRecord = $record->pluck('public_id');
        $pluckedPost = $post->pluck('public_id');
        $countRecord = count($pluckedRecord);
        $countPost = count($pluckedPost);

        if(Auth::id() !== $user->id) {
            return abort(403);
        }
        
        if(isset($user->public_id)) {
            Cloudder::destroyImage($user->public_id);
        }
        
        if(!empty($pluckedRecord[0])){
            $i=0;
            while($i < $countRecord) {
                Cloudder::destroyImage($pluckedRecord[$i]);
                $i++;
            }
        }
        
        if(!empty($pluckedPost[0])){
            $i=0;
            while($i < $countPost) {
                Cloudder::destroyImage($pluckedPost[$i]);
                $i++;
            }
        }

        $user->delete();

        return redirect()->route('/')->with('success_message', 'ユーザー情報が削除されました');
    }
}
