<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * Display a Terms of Service. 
     *
     * @return \Illuminate\Http\Response
     */
    public function tos()
    {
        return view('terms.tos');
    }

    /**
     * Display a Privacy policy. 
     *
     * @return \Illuminate\Http\Response
     */
    public function privacyPolicy()
    {
        return view('terms.privacyPolicy');
    }

    /**
     * Display a Help page. 
     *
     * @return \Illuminate\Http\Response
     */
    public function help()
    {
        return view('terms.help');
    }
}
