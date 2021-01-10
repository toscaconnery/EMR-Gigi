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
    public function store(Request $request)
    {
        // $user = $this->authUser();
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

        $hospital_id = $request->hospital_id ? $request->hospital_id : null;

        if ($user) {
            if ($user->active_superadmin == true) {
                $branchs = Branch::take($limit)
                                 ->skip($skip)
                                 ->all();
            } elseif ($user->active_admin == true) {
                $branchs = Branch::where('hospital_id', $hospital_id)
                                    ->take($limit)
                                    ->skip($skip)
                                    ->get();
            } else {
                $branchs = null;
            }
        }
        
        $response = [
            'data'  => [
                'status'    => 'success',
                'branchs'   => $branchs,
                'limit'     => $limit,
                'page'      => $page,
                'user'      => $this->authUser(),
            ],
            'error' => null
        ];
        return response()->json($response);
    }

    protected function adminValidator(array $data)
    {
        // $validator =  Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        // if ($validator->fails()) {
        //     return false;
        // } else {
        //     return true;
        // }
    }
}
