<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Hospital;
use App\Models\Branch;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    public function store(Request $request, $clinic_id)
    {
        $user = $this->authUser();

        $branchName = $request->branchName;
        $branchPhone = $request->branchPhone;
        $branchAddress = $request->branchAddress;
        $branchLatitude = $request->branchLatitude;
        $branchLongitude = $request->branchLongitude;

        $branchArray = [
            'hospital_id'   => $clinic_id,
            'name'          => $branchName,
            'address'       => $branchAddress,
            'latitude'      => $branchLatitude,
            'longitude'     => $branchLongitude,
        ];

        $branchValidate = $this->branchValidator($branchArray);

        if ($branchValidate == true) {
            $newBranch = Branch::create($branchArray);

            $response = [
                'data'  => [
                    'status'    => 'success'
                ],
                'error' => null,
            ];
        } else {
            $response = [
                'data'  => [
                    'status'    => 'failed'
                ],
                'error' => 'error',
            ];
        }

        return response()->json($response);

        // $joinDateObject = DateTime::createFromFormat('d/m/Y', $request->clinicJoinDate);
        // $joinDate = $joinDateObject->format('Y-m-d H:i:s');

        // $startWorkDateObject = DateTime::createFromFormat('d/m/Y', $request->clinicStartWorkDate);
        // $startWorkDate = $startWorkDateObject->format('Y-m-d H:i:s');

        // $hospitalExists = Hospital::where('name', $request->clinicName)
        //                          ->where('email', $request->clinicEmail)
        //                          ->first();

        // $clinicArray = [
        //     'name'      => $request->clinicName,
        //     'email'     => $request->clinicEmail,
        //     'phone'     => $request->clinicPhone,
        //     'address'   => $request->clinicAddress,
        //     'join_date' => $joinDate,
        //     'start_work_date' => $startWorkDate,
        //     'admin_id'  => null
        // ];

        // $adminArray = [
        //     'name'      => $request->adminName,
        //     'email'     => $request->adminEmail,
        //     'phone'     => $request->adminPhone,
        //     'password'  => $request->adminPassword,
        //     'password_confirmation'  => $request->adminConfirmPassword,
        //     'active_doctor' => false,
        //     'active_admin'  => true
        // ];
        
        // $adminValidate = $this->adminValidator($adminArray);

        // if ($adminValidate == true && ! $hospitalExists) {
        //     $newAdmin = User::create([
        //         'name'      => $request->adminName,
        //         'email'     => $request->adminEmail,
        //         'phone'     => $request->adminPhone,
        //         'password'  => Hash::make($request->adminPassword),
        //         'active_doctor' => false,
        //         'active_admin'  => true,
        //     ]);

        //     $clinicArray['admin_id'] = $newAdmin->id;
        //     $newHospital = Hospital::create($clinicArray);

        //     $response = [
        //         'data'  => [
        //             'status'    => 'success'
        //         ],
        //         'error' => null,
        //     ];

        // } else {
        //     $response = [
        //         'data'  => [
        //             'status'    => 'failed'
        //         ],
        //         'error' => 'error',
        //     ];
        // }

        // return response()->json($response);
    }

    public function list(Request $request)
    {
        $user = $this->authUser();

        $limit = $request->limit ? $request->limit : 10;
        $page = $request->page ? $request->page : 1;
        $skip = ($limit * $page) - $limit;

        $hospital_id = $request->clinicId ? $request->clinicId : null;
        $hospital = null;

        if ($user) {
            if ($user->active_superadmin == true) {
                $branchs = Branch::take($limit)
                                 ->skip($skip)
                                 ->get();
                $hospital = null;
            } elseif ($user->active_admin == true && $hospital_id != null) {
                $branchs = Branch::where('hospital_id', $hospital_id)
                                    ->take($limit)
                                    ->skip($skip)
                                    ->get();
            } else {
                $branchs = null;
            }

            if ($hospital_id != null) {
                $hospital = Hospital::where('id', $hospital_id)->first();
            }
        }
        
        $response = [
            'data'  => [
                'status'    => 'success',
                'branchs'   => $branchs,
                'hospital'  => $hospital,
                'limit'     => $limit,
                'page'      => $page,
                'user'      => $this->authUser(),
            ],
            'error' => null
        ];
        return response()->json($response);
    }

    protected function branchValidator(array $data)
    {
        $validator = Validator::make($data, [
            'hospital_id'   => ['required'],
            'name'      => ['required', 'string', 'max:255'],
            'address'   => ['required', 'string', 'max:255'],
            'latitude'  => ['required', 'between:-90,90'],
            'longitude' => ['required', 'between:-180,180'],
        ]);

        if ($validator->fails()) {
            return false;
        } else {
            return true;
        }
    }
}
