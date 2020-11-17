<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function company()
    {
        return view('admin.company');
    }
    public function company2()
    {
    	return view('admin.company2');
    }
    public function companyshow()
    {
    	return view('admin.company-show');
    }
    public function branch()
    {
        return view('admin.branch');
    }
    public function branchlist()
    {
        return view('admin.branch-list');
    }
}
