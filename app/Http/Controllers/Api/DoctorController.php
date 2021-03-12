<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
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
    public function list(Request $request)
    {
        $user = $this->authUser();

        $limit = $request->limit ? $request->limit : 10;
        $page = $request->page ? $request->page : 1;
        $skip = ($limit * $page) - $limit;
        $search = $request->search;

        $doctors = User::whereHas("roles", function($q){ $q->where("name", "doctor"); })
                        ->where('hospital_id', $user->hospital_id);
                        
        if ($search != '') {
            $doctors = $doctors->where('name', 'like', '%' . $search . '%');
        }

        $doctorCounterTemplate = clone $doctors;

        $doctors = $doctors->take($limit)
                            ->skip($skip);

        $doctors = $doctors->get();

        $count = $doctorCounterTemplate->count();
        $pagination = $this->generatePagination($count, $page, $limit);
        
        return response()->json([
            'data'      => [
                'doctors'       => $doctors,
                'limit'         => $limit,
                'page'          => $page,
                'pagination'    => $pagination,
            ],
            'status'    => 'success',
            'error'     => null
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
            'data'      => $newUser,
            'status'    => 'success',
            'error'     => null
        ]);   
    }

    public function register(Request $request)
    {
        $user = $this->authUser();

        $payload = [
            'name'  => $request->doctorName,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender'=> $request->gender,
            'password' => Hash::make($request->password),
            'hospital_id' => $user->hospital_id,
            'branch_id' => $request->branch
        ];

        $newUser = User::create($payload);

        $newUser->assignRole('doctor');

        return response()->json([
            'data'      => null,
            'status'    => 'success',
            'error'     => null
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

    public function delete(Request $request) {
        $user = $this->authUser();

        $doctor = User::find($request->doctorId);

        if ($doctor) {
            if ($doctor->hospital_id == $user->hospital_id) {
                $doctor->delete();
                return response()->json([
                    'data'      => null,
                    'status'    => 'success',
                    'error'     => null
                ]);
            } else {
                return response()->json($this->createErrorMessage('You have no access to delete this doctor'));
            }
        } else {
            return response()->json($this->createErrorMessage('Doctor not found'));
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
    public function update(Request $request) {
        $user = $this->authUser();

        $doctor = User::find($request->staffId);

        if ($doctor) {
            if ($doctor->hospital_id == $user->hospital_id) {
                $doctor->name = $request->staffName;
                $doctor->email = $request->email;
                $doctor->phone = $request->phone;
                $doctor->gender = $request->gender;
                if ($request->password != '') {
                    $doctor->password = bcrypt($request->password);
                }
                $doctor->save();

                return response()->json([
                    'data'      => null,
                    'status'    => 'success',
                    'error'     => null
                ]);
            } else {
                return response()->json($this->createErrorMessage('You have no access to edit this staff'));
            }
        } else {
            return response()->json($this->createErrorMessage('Staff not found'));
        }
    }

    public function detail(Request $request) {
        $user = $this->authUser();

        $doctor = User::find($request->doctorId);

        if ($doctor) {
            if ($doctor->hospital_id == $user->hospital_id) {
                return response()->json([
                    'data'  => [
                        'doctor'     => $doctor,
                    ],
                    'status'    => 'success',
                    'error' => null
                ]);
            } else {
                return response()->json($this->createErrorMessage('You have no access to view this doctor'));
            }
        } else {
            return response()->json($this->createErrorMessage('Doctor not found'));
        }
    }

    public function generatePagination($count, $page, $limit) {
        $index = [];
        $firstButton = null;
        $lastButton = null;
        if ($count > 0) {
            $firstButton = 1;
            $lastButton = ceil($count / $limit);
            $firstIndex = $page - 5;
            $lastIndex = $page + 5;
            if ($firstIndex < 1) {
                $firstIndex = 1;
            }
            if ($lastIndex > $lastButton) {
                $lastIndex = $lastButton;
            }
            for ($i = $firstIndex; $i <= $lastIndex; $i++) {
                array_push($index, $i);
            }
        } else {
            $firstButton = null;
            $firstButton = null;
        }

        return [
            'page'  => $page,
            'limit' => $limit,
            'total' => $count,
            'firstButton' => $firstButton,
            'lastButton'  => $lastButton,
            'index' => $index
        ];
    }


    // STILL IN DEVELOPMENT, NOT WORKING YET
    // public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    // {
    //     $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);

    //     if ($validator->fails()) {
    //         // $this->formatValidationErrors($validator);
    //         return response()->json($validator);
    //     }
    //     else {
    //         return response()->json([
    //             'data' => 'ok',
    //             'error' => null
    //         ]);
    //     }
    // }

    // public function self()
    // {
    //     $user = $this->authUser();

    //     $doctor = auth()->user()->isdoctor;
    //     return $doctor;
    // }
}
