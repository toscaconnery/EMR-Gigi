<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\User;
// use App\Models\Hospital;
// use App\Models\Branch;
use App\Models\Prescription;
use App\Models\Action;
use App\Models\Item;
use Auth;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class PriceController extends Controller
{
    public function store(Request $request, $clinic_id)
    {
        // $user = $this->authUser();

        // $branchName = $request->branchName;
        // $branchPhone = $request->branchPhone;
        // $branchAddress = $request->branchAddress;
        // $branchPhone = $request->branchPhone;
        // $branchLatitude = $request->branchLatitude;
        // $branchLongitude = $request->branchLongitude;

        // $branchArray = [
        //     'hospital_id'   => $clinic_id,
        //     'name'          => $branchName,
        //     'address'       => $branchAddress,
        //     'phone'         => $branchPhone,
        //     'latitude'      => $branchLatitude,
        //     'longitude'     => $branchLongitude,
        // ];

        // $branchValidate = $this->branchValidator($branchArray);

        // if ($branchValidate == true) {
        //     $newBranch = Branch::create($branchArray);

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

    // public function list(Request $request)
    // {
    //     $user = $this->authUser();

    //     $limit = $request->limit ? $request->limit : 10;
    //     $page = $request->page ? $request->page : 1;
    //     $skip = ($limit * $page) - $limit;
    //     $search = $request->search;

    //     $hospital_id = $request->clinicId ? $request->clinicId : null;
    //     $hospital = null;

    //     if ($user) {
    //         if ($user->hasRole('admin')) {
    //         // if ($user->active_superadmin == true) {
    //             $branchs = Branch::take($limit)
    //                              ->skip($skip);
    //             if ($hospital_id != null) {
    //                 $branchs->where('hospital_id', $hospital_id);
    //             }
    //             if ($search != '') {
    //                 $branchs->where('name', 'like', '%' . $search . '%');
    //             }
    //             $branchs =  $branchs->get();
    //         // } elseif ($user->active_admin == true && $hospital_id != null) {
    //         } elseif($user->hasRole('staff')) {
    //             $branchs = Branch::where('hospital_id', $hospital_id)
    //                                 ->take($limit)
    //                                 ->skip($skip);
    //             if ($search != '') {
    //                 $branchs->where('name', 'like', '%' . $search . '%');
    //             }
    //             $branchs = $branchs->get();
    //         } else {
    //             $branchs = null;
    //         }

    //         foreach($branchs as $branch) {
    //             if ($branch->phone == null) {
    //                 $branch->phone = '';
    //             }
    //         }

    //         if ($hospital_id != null) {
    //             $hospital = Hospital::where('id', $hospital_id)->first();
    //         }

    //         $pagination = $this->generatePagination($page, $limit, $hospital_id, $search);
    //     }
        
    //     $response = [
    //         'data'  => [
    //             'status'    => 'success',
    //             'branchs'   => $branchs,
    //             'hospital'  => $hospital,
    //             'limit'     => $limit,
    //             'page'      => $page,
    //             'pagination' => $pagination,
    //             'user'      => $this->authUser(),
    //         ],
    //         'error' => null
    //     ];
    //     return response()->json($response);
    // }

    public function prescriptionPrice(Request $request)
    {
        $user = $this->authUser();

        $branchId = $request->branch_id ? $request->branch_id : 1;

        $prescription = [];

        if ($user) {
            if ($user->hasRole('admin') || $user->hasRole('staff')) {
                $prescriptions = Prescription::where('branch_id', $branchId)->get();
            }
        }

        $response = [
            'data'  => [
                'status'    => 'success',
                'prescriptionlist'    => $prescriptions,
            ],
            'error' => null
        ];
        return response()->json($response);
    }

    public function actionPrice(Request $request)
    {
        $user = $this->authUser();

        $branchId = $request->branch_id ? $request->branch_id : 1;

        $actions = [];

        if ($user) {
            if ($user->hasRole('admin') || $user->hasRole('staff')) {
                $actions = Action::where('branch_id', $branchId)->get();
            }
        }

        $response = [
            'data'  => [
                'status'    => 'success',
                'actionlist'    => $actions,
            ],
            'error' => null
        ];
        return response()->json($response);
    }

    public function itemPrice(Request $request)
    {
        $user = $this->authUser();

        $branchId = $request->branch_id ? $request->branch_id : 1;

        $items = [];

        if ($user) {
            if ($user->hasRole('admin') || $user->hasRole('staff')) {
                $items = Item::where('branch_id', $branchId)->get();
            }
        }

        $response = [
            'data'  => [
                'status'    => 'success',
                'itemlist'    => $items,
            ],
            'error' => null
        ];
        return response()->json($response);
    }

    protected function priceValidator(array $data)
    {
        $validator = Validator::make($data, [
            'branch_id'   => ['required'],
            'name'      => ['required', 'string', 'max:255'],
            'price'     => ['required'],
            'stock'  => ['required'],
        ]);

        if ($validator->fails()) {
            return false;
        } else {
            return true;
        }
    }

}
