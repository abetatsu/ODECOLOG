<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\User;
use Auth;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a Contact Form. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        return view('contact.index', compact('user'));
    }
    
    /**
     * Display a Confirmation Form.
     *
     * @param  \App\Http\Requests\ContactRequestt  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(ContactRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        return view('contact.confirm', compact('name', 'email', 'message'));
    }

}
