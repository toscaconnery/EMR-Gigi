<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function medicalResume() {
        return view('download.medical-resume');
    }
}
