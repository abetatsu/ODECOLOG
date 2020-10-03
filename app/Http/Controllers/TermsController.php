<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function tos()
    {
        return view('terms.tos');
    }

    public function privacyPolicy()
    {
        return view('terms.privacyPolicy');
    }

    public function help()
    {
        return view('terms.help');
    }
}
