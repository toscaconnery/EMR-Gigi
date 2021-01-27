<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Branch;
use JWTAuth;
use Session;
use Auth;

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
    public function branchlist2()
    {
        return view('admin.branch-list');
    }

    public function roles()
    {
        return view('admin.roles');
    }
    public function addrole()
    {
        return view('admin.add-role');
    }
    public function users()
    {
        return view('admin.users');
    }
    public function doctor()
    {
        return view('admin.doctor-list');
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

    public function dashboard(Request $request)
    {
        $jwtToken = $request->session()->get('jwtApiToken');
        return view('admin.dashboard.index', compact('jwtToken'));
    }

    public function clinicCreate(Request $request)
    {
        // dd('oke');
        // $user = JWTAuth::user();
        // $value = 'new value of session';
        // Session::set('variableName', $value);
        // session()->put('hello', 'hello');
        // dd($request->session());
        // dd($user->password);
        // $email = $user->email;
        // $password = $user->password;
        // $credentials = [
        //     'email' => $email,
        //     'password' => '12345678'
        // ];
        // $token = JWTAuth::attempt($credentials);
        // dd($token);
        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.clinic.create', compact('jwtToken'));
    }

    public function clinicList(Request $request)
    {
        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.clinic.list', compact('jwtToken'));
    }

    public function branchList(Request $request, $clinic_id = null)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        } else {
            $user = Auth::user();
            $clinic = null;
            if ($user->active_superadmin == false && $clinic_id == null) {
                $clinic = Hospital::where('admin_id', $user->id)
                                  ->first();
                return redirect('/admin/branch/list/' . $clinic->id);
            }
            // else {
            //     $branch = Branch::where('hospital_id', $clinic_id)
            //                     ->get();
            // }
        }
        // dd($user);
        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.branch.list', compact('jwtToken', 'clinic_id', 'clinic'));
    }
    
    public function branchCreate(Request $request, $clinic_id)
    {
        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.branch.create', compact('jwtToken', 'clinic_id'));
    }

    public function branchDetail(Request $request, $branch_id)
    {
        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.branch.detail', compact('jwtToken', 'branch_id'));
    }

    public function priceList(Request $request, $branch_id)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        } else {
            $user = Auth::user();
            // $clinic = null;
            // $branch = Branch::where('id', $branch_id)
            //                 ->where('')
            // if ($user->active_superadmin == false && $clinic_id == null) {
            //     $clinic = Hospital::where('admin_id', $user->id)
            //                       ->first();
            //     return redirect('/admin/branch/list/' . $clinic->id);
            // }
            // else {
            //     $branch = Branch::where('hospital_id', $clinic_id)
            //                     ->get();
            // }
        }
        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.price.list', compact('jwtToken'));
    }
}