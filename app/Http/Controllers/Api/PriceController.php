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

    public function prescriptionPriceAdd(Request $request, $branchId)
    {
        $user = $this->authUser();

        $prescriptionArray = [
            'branch_id' => $branchId,
            'name'      => $request->name,
            'stock'     => $request->stock,
            'price'     => $request->price,
            'type'      => $request->type,
            'how_to_consume'    => $request->how_to_consume
        ];

        $prescriptionValidate = $this->prescriptionValidator($prescriptionArray);

        if ($prescriptionValidate == true) {
            $newPrescription = Prescription::create($prescriptionArray);

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

    public function prescriptionPriceUpdate(Request $request, $branchId)
    {
        $user = $this->authUser();

        $prescriptionArray = [
            'branch_id' => $branchId,
            'name'      => $request->name,
            'stock'     => $request->stock,
            'price'     => $request->price,
            'type'      => $request->type,
            'how_to_consume'    => $request->how_to_consume
        ];

        $prescriptionValidate = $this->prescriptionValidator($prescriptionArray);

        if ($prescriptionValidate == true) {
            $prescriptionUpdate = Prescription::where('id', $request->prescription_id)
                                            ->update($prescriptionArray);

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

    public function actionPriceUpdate(Request $request, $branchId)
    {
        $user = $this->authUser();

        $actionArray = [
            'branch_id' => $branchId,
            'name'      => $request->name,
            'price'     => $request->price,
        ];

        $actionValidate = $this->actionValidator($actionArray);

        if ($actionValidate == true) {
            $actionUpdate = Action::where('id', $request->action_id)
                                            ->update($actionArray);

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

    public function priceDelete(Request $request, $branchId, $itemType, $itemId)
    {
        $user = $this->authUser();

        if ($itemType == 'prescription') {
            $delete = Prescription::where('id', $itemId)->delete();
        } elseif ($itemType == 'action') {
            $delete = Action::where('id', $itemId)->delete();
        } elseif ($itemType == 'item') {
            $delete = Item::where('id', $itemId)->delete();
        }

        $response = [
            'data'  => [
                'status'    => 'success'
            ],
            'error' => null,
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

    public function actionPriceAdd(Request $request, $branchId)
    {
        $user = $this->authUser();

        $actionArray = [
            'branch_id' => $branchId,
            'name'      => $request->name,
            'price'     => $request->price,
        ];

        $actionValidate = $this->actionValidator($actionArray);

        if ($actionValidate == true) {
            $newAction = Action::create($actionArray);

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

    protected function prescriptionValidator(array $data)
    {
        $validator = Validator::make($data, [
            'branch_id'     => ['required'],
            'name'          => ['required', 'string', 'max:255'],
            'price'         => ['required'],
            'stock'         => ['required'],
            'type'          => ['required', 'string'],
            'how_to_consume'=> ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return false;
        } else {
            return true;
        }
    }

    protected function actionValidator(array $data)
    {
        $validator = Validator::make($data, [
            'branch_id'     => ['required'],
            'name'          => ['required', 'string', 'max:255'],
            'price'         => ['required'],
        ]);

        if ($validator->fails()) {
            return false;
        } else {
            return true;
        }
    }

}
