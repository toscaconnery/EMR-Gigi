<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $creds = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($creds)) {
            $response = [
                'data' => null,
                'error' => 'Incorrect email/password',
            ];
            return response()->json($response, 200);
        }

        $response = [
            'data' => [
                'token' => $token,
            ],
            'error' => null,
        ];

        return response()->json($response);
    }

    public function refresh()
    {
        try {
            $newToken = auth()->refresh();
        } catch (\Tymon\JWTAuth\Exception\TokenInvalidException $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }

        return response()->json(['token' => $newToken]);
    }
}
