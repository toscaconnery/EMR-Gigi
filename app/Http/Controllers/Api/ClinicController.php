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
            'admin_id'  => null
        ];

        $adminArray = [
            'name'      => $request->adminName,
            'email'     => $request->adminEmail,
            'phone'     => $request->adminPhone,
            'password'  => $request->adminPassword,
            'password_confirmation'  => $request->adminConfirmPassword,
            'active_doctor' => false,
            'active_admin'  => true
        ];
        
        $adminValidate = $this->adminValidator($adminArray);

        if ($adminValidate == true && ! $hospitalExists) {
            $newAdmin = User::create([
                'name'      => $request->adminName,
                'email'     => $request->adminEmail,
                'phone'     => $request->adminPhone,
                'password'  => Hash::make($request->adminPassword),
                'active_doctor' => false,
                'active_admin'  => true,
            ]);

            $clinicArray['admin_id'] = $newAdmin->id;
            $newHospital = Hospital::create($clinicArray);

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
    }

    public function list(Request $request)
    {
        $user = $this->authUser();

        $limit = $request->limit ? $request->limit : 10;
        $page = $request->page ? $request->page : 1;
        $skip = ($limit * $page) - $limit;
        $search = $request->search;

        if ($user) {
            if ($user->id == 1) {
                $hospitals = Hospital::take($limit)
                                    ->skip($skip);
                if ($search != '') {
                    $hospitals->where('name', 'like', '%' . $search . '%');
                }

                $hospitals = $hospitals->get();

                $onlyOwnedBySelf = false;
            } elseif ($user->active_admin == true) {
                $hospitals = Hospital::where('admin_id', $user->id)
                                    ->take($limit)
                                    ->skip($skip);
                                    // ->get();
                if ($search != '') {
                    $hospitals->where('name', 'like', '%' . $search . '%');
                }

                $hospitals = $hospitals->get();

                $onlyOwnedBySelf = true;
            } else {
                $response = [
                    'data'  => null,
                    'error' => 'Not allowed'
                ];
                return response()->json($response);
            }

            $pagination = $this->generatePagination($page, $limit, $user->id, $search, $onlyOwnedBySelf);
            // $pagination = 1;
        }
        
        $response = [
            'data'  => [
                'status'    => 'success',
                'hospitals'  => $hospitals,
                'limit'     => $limit,
                'page'      => $page,
                'pagination' => $pagination,
                'user'      => $this->authUser(),
            ],
            'error' => null
        ];
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

    public function generatePagination($page, $limit, $user_id, $search, $only_owned_by_self) {
        if ($only_owned_by_self == false) {
            $dataCount = DB::table('hospital');
            if ($search == '') {
                $dataCount = $dataCount->count();
            } else {
                $dataCount = $dataCount->where('name', 'like', '%' . $search . '%')->count();
            }
        } else {
            $dataCount = DB::table('hospital')->where('admin_id', '=', $user_id);
            if ($search == '') {
                $dataCount = $dataCount->count();
            } else {
                $dataCount = $dataCount->where('name', 'like', '%' . $search . '%')->count();
            }
        }
        
        $index = [];
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
}
