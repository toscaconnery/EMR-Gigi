<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    /**
     * @OA\Get(
     *     path="/projects",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
	public function index(Request $request){
		echo $request->mytest;
	}
}
