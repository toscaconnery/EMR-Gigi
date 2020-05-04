<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function listAppointment()
    {
        return view('pages.list-appointment');
    }
}
