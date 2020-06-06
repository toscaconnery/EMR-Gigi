<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function patientDashboard()
    {
        return view('pages.patient-dashboard');
    }

    public function patientHistory()
    {
        return view('pages.patient-history');
    }
}
