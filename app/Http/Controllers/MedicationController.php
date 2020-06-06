<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicationController extends Controller
{
    public function medicationHistory()
    {
        return view('pages.medication-history');
    }
}
