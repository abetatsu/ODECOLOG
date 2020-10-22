<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a Questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function question()
    {
        return view('questions.question');
    }
}
