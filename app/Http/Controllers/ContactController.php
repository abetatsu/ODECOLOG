<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('contact.index');
    }

    public function confirm(ContactRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        return view('contact.confirm', compact('name', 'email', 'message'));
    }

}
