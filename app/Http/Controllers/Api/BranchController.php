<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Hospital;
use App\Models\Branch;
use Auth;
use DateTime;
use Carbon\Carbon;
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
        $branchPhone = $request->branchPhone;
        $branchLatitude = $request->branchLatitude;
        $branchLongitude = $request->branchLongitude;

        $branchArray = [
            'hospital_id'   => $clinic_id,
            'name'          => $branchName,
            'address'       => $branchAddress,
            'phone'         => $branchPhone,
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

            foreach($branchs as $branch) {
                if ($branch->phone == null) {
                    $branch->phone = '';
                }
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
            'phone'     => ['required', 'max:40'],
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
