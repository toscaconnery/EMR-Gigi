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
use DB;

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
        $search = $request->search;

        $hospital_id = $request->clinicId ? $request->clinicId : null;
        $hospital = null;

        if ($user) {
            if ($user->hasRole('superadmin') || $user->hasRole('admin'))
            {
                $branchs = Branch::take($limit)
                                 ->skip($skip);
                if ($hospital_id != null) {
                    $branchs->where('hospital_id', $hospital_id);
                }
                if ($search != '') {
                    $branchs->where('name', 'like', '%' . $search . '%');
                }
                $branchs =  $branchs->get();
            } elseif($user->hasRole('staff')) {
                $branchs = Branch::where('hospital_id', $hospital_id)
                                    ->take($limit)
                                    ->skip($skip);
                if ($search != '') {
                    $branchs->where('name', 'like', '%' . $search . '%');
                }
                $branchs = $branchs->get();
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

            $pagination = $this->generatePagination($page, $limit, $hospital_id, $search);
        }
        
        $responseData = [
            'status'    => 'success',
            'branchs'   => $branchs,
            'hospital'  => $hospital,
            'limit'     => $limit,
            'page'      => $page,
            'pagination' => $pagination,
        ];
        $response = $this->createResponse($responseData);
        return response()->json($response);
    }

    public function detail(Request $request, $branchId)
    {
        $user = $this->authUser();
        $branch = null;

        if ($user) {
            if ($user->hasRole('admin') || $user->hasRole('staff')) {
                $branch = Branch::find($branchId);
            }
        }

        $responseData = [
            'branch'   => $branch,
        ];

        return response()->json($this->createResponse($responseData));
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

    public function generatePagination($page, $limit, $clinic_id = null, $search) {
        if ($clinic_id == null) {
            $dataCount = DB::table('branch');
            if ($search == '') {
                $dataCount = $dataCount->count();
            } else {
                $dataCount = $dataCount->where('name', 'like', '%' . $search . '%')->count();
            }
        } else {
            $dataCount = DB::table('branch')->where('hospital_id', '=', $clinic_id);
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

    public function getAvailableBranchOption(Request $request)
    {
        $user = $this->authUser();

        if ($user->hasRole('admin')) {
            $branchs = Branch::where('hospital_id', $user->hospital_id)->get();
            return response()->json([
                'data'  => [
                    'branchs'   => $branchs
                ],
                'error' => null
            ]);
        } else {
            return response()->json([
                'data'  => null,
                'error' => 'Access denied'
            ]);
        }
    }
}
