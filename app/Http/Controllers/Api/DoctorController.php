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

    // Todo : create validation
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

        return response()->json([
            $data = $newUser,
            'error' => null
        ]);   
    }

    public function delete($doctor_id)
    {
        $user = $this->authUser();

        $doctor = User::where('active_doctor', true)
                        ->where('id', $doctor_id)
                        ->first();
        if ($doctor) {
            $doctor->delete();
            return response()->json([
                'data'  => [
                    'messages'  => 'Doctor deleted',
                    'status'    => 'success'
                ],
                'error' => null
            ]);
        } else {
            return response()->json($this->createErrorMessage('Cannot find the doctor.'));
        }
    }

    public function update(Request $request, $doctor_id) {
        $user = $this->authUser();

        $doctor = User::where('active_doctor', true)
                        ->where('id', $doctor_id)
                        ->first();

        if ($doctor) {
            $payload = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $doctor->update($payload);
            return response()->json([
                'data'  => [
                    'messages'  => 'Doctor updated',
                    'status'    => 'success'
                ],
                'error' => null
            ]);
        } else {
            return response()->json($this->createErrorMessage('Cannot find the doctor.'));
        }
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

    public function self()
    {
        $user = $this->authUser();

        $doctor = auth()->user()->isdoctor;
        return $doctor;
    }
}
