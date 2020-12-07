<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class DoctorController extends Controller
{


    public function doctorList()
    {
        $user = $this->authUser();

        $doctors = User::select('id', 'name', 'email', 'employee_id')
                        ->where('is_doctor', true)->get();
        return response()->json([
            'data'  => $doctors,
            'error' => null
        ]);
    }

    public function self()
    {
        $user = $this->authUser();

        $doctor = auth()->user()->isdoctor;
        return $doctor;
    }
}
