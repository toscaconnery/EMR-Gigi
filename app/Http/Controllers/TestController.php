<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{
    public function checkUserList()
    {
        $userList = User::get();
        dd($userList);
    }
}
