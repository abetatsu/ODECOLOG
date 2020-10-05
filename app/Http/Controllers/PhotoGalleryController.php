<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Record;
use Auth;

class PhotoGalleryController extends Controller
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
        $records = Record::where('user_id', Auth::id())->get();

        return view('photos.index', compact('records'));
    }
}
