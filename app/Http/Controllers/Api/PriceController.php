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
            'data'      => [
                'prescriptionlist'    => $prescriptions,
            ],
            'status'    => 'success',
            'error'     => null
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
                'data'      => null,
                'status'    => 'success',
                'error'     => null,
            ];

        } else {
            $response = [
                'data'      => null,
                'status'    => 'failed',
                'error'     => 'invalid',
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
                'data'      => null,
                'status'    => 'success',
                'error'     => null,
            ];

        } else {
            $response = [
                'data'      => null,
                'status'    => 'failed',
                'error'     => 'invalid',
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
                'data'      => null,
                'status'    => 'success',
                'error'     => null,
            ];

        } else {
            $response = [
                'data'      => null,
                'status'    => 'failed',
                'error'     => 'invalid',
            ];
        }

        return response()->json($response);
    }

    public function itemPriceUpdate(Request $request, $branchId)
    {
        $user = $this->authUser();

        $itemArray = [
            'branch_id' => $branchId,
            'name'      => $request->name,
            'price'     => $request->price,
            'stock'     => $request->stock
        ];

        $itemValidate = $this->itemValidator($itemArray);

        if ($itemValidate == true) {
            $itemUpdate = Item::where('id', $request->item_id)
                                            ->update($itemArray);

            $response = [
                'data'      => null,
                'status'    => 'success',
                'error'     => null,
            ];

        } else {
            $response = [
                'data'      => null,
                'status'    => 'failed',
                'error'     => 'invalid',
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
            'data'      => null,
            'status'    => 'success',
            'error'     => null,
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
                'actionlist'    => $actions,
            ],
            'status'    => 'success',
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
                'data'      => null,
                'status'    => 'success',
                'error'     => null,
            ];

        } else {
            $response = [
                'data'      => null,
                'status'    => 'failed',
                'error'     => 'invalid',
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
                'itemlist'    => $items,
            ],
            'status'    => 'success',
            'error'     => null
        ];
        return response()->json($response);
    }

    public function itemPriceAdd(Request $request, $branchId)
    {
        $user = $this->authUser();

        $itemArray = [
            'branch_id' => $branchId,
            'name'      => $request->name,
            'stock'     => $request->stock,
            'price'     => $request->price,
        ];

        $itemValidate = $this->itemValidator($itemArray);

        if ($itemValidate == true) {
            $newPrescription = Item::create($itemArray);

            $response = [
                'data'      => null,
                'status'    => 'success',
                'error'     => null,
            ];

        } else {
            $response = [
                'data'      => null,
                'status'    => 'failed',
                'error'     => 'error',
            ];
        }

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

    protected function itemValidator(array $data)
    {
        $validator = Validator::make($data, [
            'branch_id'     => ['required'],
            'name'          => ['required', 'string', 'max:255'],
            'price'         => ['required'],
            'stock'         => ['required'],
        ]);

        if ($validator->fails()) {
            return false;
        } else {
            return true;
        }
    }

    public function getAvailableActionOption(Request $request)
    {
        $user = $this->authUser();

        if ($user->hasRole('admin') || $user->hasRole('superadmin')) {
            $branchId = $request->branch_id;
            $actions = Action::where('branch_id', $branchId)->get();
            return response()->json([
                'data'      => [
                    'actions'   => $actions
                ],
                'status'    => 'success',
                'error'     => null
            ]);
        } else {
            return response()->json([
                'data'      => null,
                'status'    => 'failed',
                'error'     => 'Access denied'
            ]);
        }
    }

}
