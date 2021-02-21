<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Hospital;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class ClinicController extends Controller
{
    public function store(Request $request)
    {
        $user = $this->authUser();
        $joinDateObject = DateTime::createFromFormat('d/m/Y', $request->clinicJoinDate);
        $joinDate = $joinDateObject->format('Y-m-d H:i:s');

        $startWorkDateObject = DateTime::createFromFormat('d/m/Y', $request->clinicStartWorkDate);
        $startWorkDate = $startWorkDateObject->format('Y-m-d H:i:s');

        $hospitalExists = Hospital::where('name', $request->clinicName)
                                 ->where('email', $request->clinicEmail)
                                 ->first();

        $clinicArray = [
            'name'      => $request->clinicName,
            'email'     => $request->clinicEmail,
            'phone'     => $request->clinicPhone,
            'address'   => $request->clinicAddress,
            'join_date' => $joinDate,
            'start_work_date' => $startWorkDate,
        ];

        $adminArray = [
            'name'      => $request->adminName,
            'email'     => $request->adminEmail,
            'phone'     => $request->adminPhone,
            'password'  => $request->adminPassword,
            'password_confirmation'  => $request->adminConfirmPassword
        ];
        
        $adminValidate = $this->adminValidator($adminArray);

        if ($adminValidate == true && ! $hospitalExists) {
            $newHospital = Hospital::create($clinicArray);

            $newAdmin = User::create([
                'name'      => $request->adminName,
                'email'     => $request->adminEmail,
                'phone'     => $request->adminPhone,
                'password'  => Hash::make($request->adminPassword),
                'hospital_id'   => $newHospital->id
            ]);

            $newAdmin->assignRole('admin');

            // $response = [
            //     'data'  => null,
            //     'status'    => 'success',
            //     'error' => null,
            // ];
            $response = $this->createResponse(null);

        } else {
            // $response = [
            //     'data'  => [
            //         'status'    => 'failed'
            //     ],
            //     'error' => 'error',
            // ];
            $response = $this->createErrorMessage('Failed storing to database');
        }

        return response()->json($response);
    }

    public function list(Request $request)
    {
        $user = $this->authUser();

        $limit = $request->limit ? $request->limit : 10;
        $page = $request->page ? $request->page : 1;
        $skip = ($limit * $page) - $limit;
        $search = $request->search;

        if ($user) {
            if ($user->hasRole('superadmin')) {
                $hospitals = Hospital::take($limit)
                                        ->skip($skip);
                if ($search != '') {
                    $hospitals->where('name', 'like', '%' . $search . '%');
                }
                $hospitals = $hospitals->get();
                $onlyOwnedBySelf = false;
            } elseif ($user->hasRole('staff') || $user->hasRole('admin')) {
                $hospitals = Hospital::where('id', $user->hospital_id)
                                        ->take($limit)
                                        ->skip($skip);
                if ($search != '') {
                    $hospitals->where('name', 'like', '%' . $search . '%');
                }
                $hospitals = $hospitals->get();
                $onlyOwnedBySelf = true;
            } else {
                // $response = [
                //     'data'      => null,
                //     'status'    => 'error',
                //     'error'     => 'Not allowed'
                // ];
                $response = $this->createErrorMessage('Not Allowed');
                return response()->json($response);
            }
            $pagination = $this->generatePagination($page, $limit, $user, $search, $onlyOwnedBySelf);
        }
        
        $responseData = [
            'hospitals'     => $hospitals,
            'limit'         => $limit,
            'page'          => $page,
            'pagination'    => $pagination,
            // 'user'          => $this->authUser(),
        ];
        $response = $this->createResponse($responseData);
        return response()->json($response);
    }

    protected function adminValidator(array $data)
    {
        $validator =  Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return false;
        } else {
            return true;
        }
    }

    public function generatePagination($page, $limit, $user, $search, $onlyOwnedBySelf) {
        if ($onlyOwnedBySelf == false) {
            $dataCount = DB::table('hospital');
            if ($search == '') {
                $dataCount = $dataCount->count();
            } else {
                $dataCount = $dataCount->where('name', 'like', '%' . $search . '%')->count();
            }
        } else {
            $dataCount = DB::table('hospital')->where('id', '=', $user->hospital_id);
            if ($search == '') {
                $dataCount = $dataCount->count();
            } else {
                $dataCount = $dataCount->where('name', 'like', '%' . $search . '%')->count();
            }
        }
        
        $index = [];
        $firstButton = null;
        $lastButton = null;
        if ($dataCount > 0) {
            $firstButton = 1;
            $lastButton = ceil($dataCount / $limit);
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
            'total' => $dataCount,
            'firstButton' => $firstButton,
            'lastButton'  => $lastButton,
            'index' => $index
        ];
    }

    public function getCurrentClinic(Request $request)
    {
        $user = $this->authUser();

        if ($user->hasRole('admin')) {
            // $branchs = Branch::where('hospital_id', $user->hospital_id)->get();
            $hospital = Hospital::find($user->hospital_id);
            $responseData = $this->createResponse(['hospital' => $hospital]);
            // return response()->json([
            //     'data'  => [
            //         'hospital'   => $hospital
            //     ],
            //     'error' => null
            // ]);
            return response()->json($responseData);
        } else {
            // return response()->json([
            //     'data'  => null,
            //     'error' => 'Access denied'
            // ]);
            return response()->json($this->createErrorMessage('Access denied'));
        }
    }
}
