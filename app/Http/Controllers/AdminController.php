<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function company()
    {
        return view('admin.company');
    }
    public function listCompany()
    {
        return view('admin.list-company');
    }
    public function branch()
    {
        return view('admin.branch');
    }
    public function branchlist()
    {
        return view('admin.branch-list');
    }

    public function roles()
    {
        return view('admin.roles');
    }
    public function addroles()
    {
        return view('admin.add-roles');
    }
    public function users()
    {
        return view('admin.users');
    }
    public function doctor()
    {
        return view('admin.doctors');
    }
    public function prescription()
    {
        return view('admin.prescription');
    }
    public function adduser()
    {
        return view('admin.add-user');
    }
    public function adddoctor()
    {
        return view('admin.add-doctor');
    }
    public function addprescript()
    {
        return view('admin.add-prescription');
    }
}