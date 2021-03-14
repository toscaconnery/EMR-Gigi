<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\DoctorAction;
use App\User;
use Auth;
use DB;
// use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function list(Request $request)
    {
        $user = $this->authUser();

        $limit = $request->limit ? $request->limit : 10;
        $page = $request->page ? $request->page : 1;
        $skip = ($limit * $page) - $limit;
        $search = $request->search;

        $doctors = User::whereHas("roles", function($q){ $q->where("name", "doctor"); });

        if ($user->hasRole('admin')) {
            $doctors->where('hospital_id', $user->hospital_id);
        }
                        
        $doctors->with('workBranch');
                        
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

        foreach($request->selectedActions as $sact) {
            DoctorAction::create([
                'doctor_id' => $newUser->id,
                'action_id' => $sact
            ]);
        }

        $newUser->assignRole('doctor');

        return response()->json([
            'data'      => null,
            'status'    => 'success',
            'error'     => null
        ]);        
    }

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

    public function update(Request $request) {
        $user = $this->authUser();

        $doctor = User::find($request->doctorId);

        if ($doctor) {
            if ($doctor->hospital_id == $user->hospital_id) {
                $actions = DoctorAction::where('doctor_id', $request->doctorId)->get();

                $doctor->name = $request->doctorName;
                $doctor->email = $request->email;
                $doctor->phone = $request->phone;
                $doctor->gender = $request->gender;
                if ($request->password != '') {
                    $doctor->password = bcrypt($request->password);
                }
                $doctor->save();

                $currentActions = [];

                // Delete all actions that not in use
                foreach($actions as $act) {
                    array_push($currentActions, $act->action_id);
                    if ( ! in_array($act->action_id, $request->selectedActions)) {
                        $act->delete();
                    }
                }
                // Create if doctor action does not exists
                foreach($request->selectedActions as $sa) {
                    if ( ! in_array($sa, $currentActions)) {
                        DoctorAction::create([
                            'doctor_id' => $request->doctorId,
                            'action_id' => $sa
                        ]);
                    }
                }

                return response()->json([
                    'data'      => null,
                    'status'    => 'success',
                    'error'     => null,
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
                $actions = DoctorAction::where('doctor_id', $request->doctorId)->get();
                return response()->json([
                    'data'  => [
                        'doctor'    => $doctor,
                        'actions'   => $actions,
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
}
