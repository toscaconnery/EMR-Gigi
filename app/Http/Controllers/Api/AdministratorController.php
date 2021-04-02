<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
// use App\Models\DoctorAction;
use App\User;
use Auth;
use DB;

class AdministratorController extends Controller
{
    public function list(Request $request)
    {
        $user = $this->authUser();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $limit = $request->limit ? $request->limit : 10;
            $page = $request->page ? $request->page : 1;
            $skip = ($limit * $page) - $limit;
            $search = $request->search;
    
            $administrators = User::whereHas("roles", function($q){ $q->where("name", "admin"); });
    
            if ($user->hasRole('admin')) {
                $administrators->where('hospital_id', $user->hospital_id);
            }
                            
            $administrators->with('workBranch');
                            
            if ($search != '') {
                $administrators = $administrators->where('name', 'like', '%' . $search . '%');
            }
    
            $administratorCounterTemplate = clone $administrators;
    
            $administrators = $administrators->take($limit)
                                             ->skip($skip);
    
            $administrators = $administrators->get();
    
            $count = $administratorCounterTemplate->count();
            $pagination = $this->generatePagination($count, $page, $limit);
            
            return response()->json([
                'data'      => [
                    'administrators'    => $administrators,
                    'limit'             => $limit,
                    'page'              => $page,
                    'pagination'        => $pagination,
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

        if ($user->hasRole('superadmin')) {
            $hospitalId = $request->clinic;
        } else if ($user->hasRole('admin')) {
            $hospitalId = $user->hospital_id;
        } else {
            return response()->json($this->createErrorMessage('Not allowed'));
        }

        $payload = [
            'name'  => $request->administratorName,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender'=> $request->gender,
            'password' => Hash::make($request->password),
            'hospital_id' => $hospitalId,
        ];

        $newUser = User::create($payload);

        $newUser->assignRole('admin');

        return response()->json([
            'data'      => null,
            'status'    => 'success',
            'error'     => null
        ]);    
    }

    public function detail(Request $request) {
        $user = $this->authUser();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $administrator = User::find($request->administratorId);
    
            if ($administrator) {
                if ($administrator->hospital_id == $user->hospital_id || $user->hasRole('superadmin')) {
                    return response()->json([
                        'data'      => [
                            'administrator'     => $administrator,
                        ],
                        'status'    => 'success',
                        'error'     => null
                    ]);
                } else {
                    return response()->json($this->createErrorMessage('You have no access to view this administrator'));
                }
            } else {
                return response()->json($this->createErrorMessage('Administrator not found'));
            }
        } else {
            return response()->json($this->createErrorMessage('Not allowed'));
        }

    }

    public function delete(Request $request) {
        $user = $this->authUser();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $administrator = User::find($request->administratorId);
    
            if ($administrator) {
                if ($administrator->hospital_id == $user->hospital_id || $user->hasRole('superadmin')) {
                    $administrator->delete();
                    return response()->json([
                        'data'      => null,
                        'status'    => 'success',
                        'error'     => null
                    ]);
                } else {
                    return response()->json($this->createErrorMessage('You have no access to delete this administrator'));
                }
            } else {
                return response()->json($this->createErrorMessage('Administrator not found'));
            }
        }

    }

    public function update(Request $request) {
        $user = $this->authUser();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $administrator = User::find($request->administratorId);
    
            if ($administrator) {
                if ($administrator->hospital_id == $user->hospital_id || $user->hasRole('superadmin')) {
                    $administrator->name = $request->administratorName;
                    $administrator->email = $request->email;
                    $administrator->phone = $request->phone;
                    $administrator->gender = $request->gender;
                    if ($request->password != '') {
                        $administrator->password = bcrypt($request->password);
                    }
                    $administrator->save();
    
                    return response()->json([
                        'data'      => null,
                        'status'    => 'success',
                        'error'     => null
                    ]);
                } else {
                    return response()->json($this->createErrorMessage('You have no access to edit this administrator'));
                }
            } else {
                return response()->json($this->createErrorMessage('Administrator not found'));
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