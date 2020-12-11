<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ClinicController extends Controller
{
    public function store(Request $request)
    {
        $user = $this->authUser();
        $response = [
            'data'  => $request,
            'error' => null,
            'test'  => $user
        ];
        return response()->json($response);
    }
}
