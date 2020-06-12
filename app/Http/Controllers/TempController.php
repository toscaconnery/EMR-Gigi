<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempController extends Controller
{
    public function newLogin()
    {
        return view('pages.new-login');
    }

    public function newRegister()
    {
        return view('pages.new-register');
    }
}
