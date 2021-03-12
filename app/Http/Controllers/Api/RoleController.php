<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class RoleController extends Controller
{
    public function roleList()
    {
        $user = $this->authUser();
        $roles = \Spatie\Permission\Models\Role::all();

        return response()->json([
            'data'      => [
                'roles' => $roles,
            ],
            'status'    => 'success',
            'error'     => null
        ]);
    }
}
