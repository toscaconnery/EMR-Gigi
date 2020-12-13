<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Session;

class SessionController extends Controller
{
    public function getJWTToken(Request $request)
    {
        
        $jwtToken = $request->session()->get('jwtApiToken');
        // dd($jwtToken);
        // $jwtToken = $request->session()->get('jwtApiToken');

        return response()->json([
            'data'  => $jwtToken,
            'error' => null
        ]);
    }
}
