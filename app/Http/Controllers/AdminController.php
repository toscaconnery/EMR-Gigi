<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function company()
    {
        return view('admin.company');
    }
}
