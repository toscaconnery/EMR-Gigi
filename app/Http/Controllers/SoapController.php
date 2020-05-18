<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoapController extends Controller
{
    public function form()
    {
        return view('pages.soap');
    }
}
