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
    /**
     * @OA\Get(
     *      path="/api/doctor/list",
     *      tags={"doctor"},
     *      description="Get doctors list",
     *      @OA\Response(
     *          response="200",
     *          description="Display a listing of doctors."
     *      )
     * )
     */
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

    /**
     * @OA\Post(
     *      path="/api/doctor/create",
     *      tags={"doctor"},
     *      description="Register a new doctor",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="name",
     *                      description="Doctor name",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      description="Doctor email, used for login",
     *                      type="email",
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      description="Doctor password, used for login",
     *                      type="password"
     *                  ),
     *                  @OA\Property(
     *                      property="gender",
     *                      description="Doctor gender (f/m)",
     *                      type="enum"
     *                  ),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="New doctor added to database."
     *      ),
     * )
     */
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
    

    /**
     * @OA\Get(
     *      path="/api/doctor/delete/{doctor_id}",
     *      tags={"doctor"},
     *      description="Remove a doctor",
     *      @OA\Parameter(
     *          name="doctor_id",
     *          in="query",
     *          description="ID of doctor that you want to delete",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Doctor deleted."
     *      )
     * )
     */
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

        /**
     * @OA\Post(
     *      path="/api/doctor/update/{doctor_id}",
     *      tags={"doctor"},
     *      description="Update doctor data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="name",
     *                      description="Doctor name",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      description="Doctor email, used for login",
     *                      type="email",
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      description="Doctor password, used for login",
     *                      type="password"
     *                  ),
     *              )
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="doctor_id",
     *          in="query",
     *          description="ID of doctor that you want to update",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Doctor data updated."
     *      ),
     * )
     */
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