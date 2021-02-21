<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        auth()->setDefaultDriver('api');
    }

    public function authUser()
    {
        try {
            $user = auth()->userOrFail();
        } catch(\Tymon\JWT\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        return $user;
    }

    public function createErrorMessage($message)
    {
        $response = [
            'data'      => null,
            'status'    => 'failed',
            'error'     => $message
        ];
        return $response;
    }

    public function createResponse($data)
    {
        $response = [
            'data'      => $data,
            'status'    => 'success',
            'error'     => null
        ];
        return $response;
    }
}
