<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Auth;
// use Illuminate\Support\Facades\Validator;

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

    public function create(Request $request)
    {
        $user = $this->authUser();

        $payload = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'active_doctor' => 1,
        ];

        $newUser = User::create($payload);
        

        // $validatedData = $this->validate($request, [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        // $x = Validator::make($payload, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        // $rules = [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ];

        // $validatedData = $this->validate($request, $rules);

        return response()->json([
            $data = $newUser,
            'error' => null
        ]);
        
        // return response()->json($payload);
    }

    // STILL IN DEVELOPMENT, NOT WORKING YET
    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            // $this->formatValidationErrors($validator);
            return response()->json($validator);
        }
        else {
            return response()->json([
                'data' => 'ok',
                'error' => null
            ]);
        }
    }

    // 'name', 'email', 'password', 'active_doctor'

    public function self()
    {
        $user = $this->authUser();

        $doctor = auth()->user()->isdoctor;
        return $doctor;
    }
}
