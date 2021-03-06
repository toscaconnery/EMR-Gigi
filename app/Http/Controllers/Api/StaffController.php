<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class StaffController extends Controller
{
    public function list(Request $request)
    {
        $user = $this->authUser();
        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {

            $limit = $request->limit ? $request->limit : 10;
            $page = $request->page ? $request->page : 1;
            $skip = ($limit * $page) - $limit;
            $search = $request->search;

            $staffs = User::whereHas("roles", function($q){ $q->where("name", "staff"); });

            if ($user->hasRole('admin')) {
                $staffs->where('hospital_id', $user->hospital_id);
            }
                            
            if ($search != '') {
                $staffs = $staffs->where('name', 'like', '%' . $search . '%');
            }

            $staffCounterTemplate = clone $staffs;

            $staffs = $staffs->take($limit)
                                ->skip($skip);

            $staffs = $staffs->with('workBranch')->get();

            $count = $staffCounterTemplate->count();
            $pagination = $this->generatePagination($count, $page, $limit);
            
            return response()->json([
                'data'  => [
                    'staffs'   => $staffs,
                    'limit'     => $limit,
                    'page'      => $page,
                    'pagination' => $pagination,
                ],
                'status'    => 'success',
                'error'     => null
            ]);
        } else {
            return response()->json($this->createErrorMessage('Not allowed'));
        }
    }

    public function register(Request $request)
    {
        $user = $this->authUser();

        if ($user->hasRole('superadmin') ||  $user->hasRole('admin')) {     
            if ($user->hasRole('superadmin')) {
                $hospitalId = $request->clinic;
            } else {
                $hospitalId = $user->hospital_id;
            }
            $payload = [
                'name'  => $request->staffName,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender'=> $request->gender,
                'password' => Hash::make($request->password),
                'hospital_id' => $hospitalId,
                'branch_id' => $request->branch
            ];
    
            $newUser = User::create($payload);
    
            $newUser->assignRole('staff');
    
            return response()->json([
                'data'      => null,
                'status'    => 'success',
                'error'     => null
            ]);
        } else {
            return response()->json($this->createErrorMessage('Not allowed'));
        }

    }

    public function detail(Request $request) {
        $user = $this->authUser();

        if ($user->hasRole('superadmin') ||  $user->hasRole('admin')) {
            $staff = User::find($request->staffId);
    
            if ($staff) {
                if ($staff->hospital_id == $user->hospital_id || $user->hasRole('superadmin')) {
                    return response()->json([
                        'data'      => [
                            'staff'     => $staff,
                        ],
                        'status'    => 'success',
                        'error'     => null
                    ]);
                } else {
                    return response()->json($this->createErrorMessage('You have no access to view this staff'));
                }
            } else {
                return response()->json($this->createErrorMessage('Staff not found'));
            }
        } else {
            return response()->json($this->createErrorMessage('Not allowed'));
        }
    }

    public function delete(Request $request) {
        $user = $this->authUser();

        if ($user->hasRole('superadmin') ||  $user->hasRole('admin')) {
            $staff = User::find($request->staffId);
    
            if ($staff) {
                if ($staff->hospital_id == $user->hospital_id || $user->hasRole('superadmin')) {
                    $staff->delete();
                    return response()->json([
                        'data'      => null,
                        'status'    => 'success',
                        'error'     => null
                    ]);
                } else {
                    return response()->json($this->createErrorMessage('You have no access to delete this staff'));
                }
            } else {
                return response()->json($this->createErrorMessage('Staff not found'));
            }
        } else {
            return response()->json($this->createErrorMessage('Not allowed'));
        }

    }

    public function update(Request $request) {
        $user = $this->authUser();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $staff = User::find($request->staffId);
    
            if ($staff) {
                if ($staff->hospital_id == $user->hospital_id || $user->hasRole('superadmin')) {
                    $staff->name = $request->staffName;
                    $staff->email = $request->email;
                    $staff->phone = $request->phone;
                    $staff->gender = $request->gender;
                    if ($request->password != '') {
                        $staff->password = bcrypt($request->password);
                    }
                    $staff->save();
    
                    return response()->json([
                        'data'      => null,
                        'status'    => 'success',
                        'error'     => null
                    ]);
                } else {
                    return response()->json($this->createErrorMessage('You have no access to edit this staff'));
                }
            } else {
                return response()->json($this->createErrorMessage('Staff not found'));
            }
        } else {
            return response()->json($this->createErrorMessage('Not allowed'));
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
