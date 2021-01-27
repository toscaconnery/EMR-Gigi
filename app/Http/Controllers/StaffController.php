<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function dashboard(Request $request)
    {
        // dd('You are on staff dashboard');
        $jwtToken = $request->session()->get('jwtApiToken');
        return view('admin.dashboard.index', compact('jwtToken'));
    }
}
