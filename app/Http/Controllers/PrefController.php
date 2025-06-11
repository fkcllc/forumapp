<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrefController extends Controller
{
    public function pref1method()
    {
        return view('prefixTest');
    }

    public function pref2method(Request $request)
    {
        dd('named1 POST:  ' . $request->get('title'));
    }

    public function pref3method(Request $request)
    {
        dd('named2 PUT:  ' . $request->get('title'));
    }
}
