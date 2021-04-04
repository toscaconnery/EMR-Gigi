<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Branch;
use App\Models\Prescription;
use App\Models\Action;
use App\Models\Item;
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
    public function addebrole()
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
    public function adddoctorx()
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
        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.clinic.create', compact('jwtToken'));
    }

    public function clinicList(Request $request)
    {
        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.clinic.list', compact('jwtToken'));
    }

    public function branchList(Request $request)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $jwtToken = $request->session()->get('jwtApiToken');
            return view('admin.branch.list', compact('jwtToken'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function branchCreate(Request $request)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        $jwtToken = $request->session()->get('jwtApiToken');

        if ($user->hasRole('superadmin')) {
            $clinic_id = null;
            return view('admin.branch.create', compact('jwtToken', 'clinic_id'));
        } elseif ($user->hasRole('admin')) {
            $clinic_id = $user->hospital_id;
            $clinic = Hospital::find($clinic_id);
            $clinic_name = $clinic->name;
            return view('admin.branch.create', compact('jwtToken', 'clinic_id', 'clinic_name'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function branchDetail(Request $request, $branchId)
    {
        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.branch.detail', compact('jwtToken', 'branchId'));
    }

    public function priceList(Request $request, $branchId)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.price.list', compact('jwtToken', 'branchId'));
    }

    public function addPrescription(Request $request, $branchId)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.price.add-prescription', compact('jwtToken', 'branchId'));
    }

    public function addAction(Request $request, $branchId)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.price.add-action', compact('jwtToken', 'branchId'));
    }

    public function addItem(Request $request, $branchId)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $jwtToken = $request->session()->get('jwtApiToken');

        return view('admin.price.add-item', compact('jwtToken', 'branchId'));
    }

    public function editPrescription(Request $request, $branchId, $prescriptionId)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $jwtToken = $request->session()->get('jwtApiToken');

        $prescription = Prescription::where('id', $prescriptionId)->first();

        return view('admin.price.edit-prescription', compact('jwtToken', 'branchId', 'prescription'));
    }

    public function editAction(Request $request, $branchId, $actionId)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $jwtToken = $request->session()->get('jwtApiToken');

        $action = Action::where('id', $actionId)->first();

        return view('admin.price.edit-action', compact('jwtToken', 'branchId', 'action'));
    }

    public function revenueView()
    {
        return view('admin.reports.revenue');
    }

    public function editItem(Request $request, $branchId, $itemId)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $jwtToken = $request->session()->get('jwtApiToken');

        $item = Item::where('id', $itemId)->first();

        return view('admin.price.edit-item', compact('jwtToken', 'branchId', 'item'));
    }

    public function doctorCreate(Request $request)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $jwtToken = $request->session()->get('jwtApiToken');

            return view('admin.doctor.create', compact('jwtToken'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function doctorList(Request $request)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('admin') || $user->hasRole('superadmin')) {
            $jwtToken = $request->session()->get('jwtApiToken');

            return view('admin.doctor.list', compact('jwtToken'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function doctorDetail(Request $request, $doctor_id)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('admin') || $user->hasRole('superadmin')) {
            $jwtToken = $request->session()->get('jwtApiToken');
            $doctorId = $doctor_id;

            return view('admin.doctor.detail', compact('jwtToken', 'doctorId'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function doctorEdit(Request $request, $doctor_id)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('admin') || $user->hasRole('superadmin')) {
            $jwtToken = $request->session()->get('jwtApiToken');
            $doctorId = $doctor_id;

            return view('admin.doctor.edit', compact('jwtToken', 'doctorId'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function roleList(Request $request)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('admin') || $user->hasRole('superadmin')) {
            $jwtToken = $request->session()->get('jwtApiToken');

            return view('admin.role.list', compact('jwtToken'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function staffList(Request $request)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $jwtToken = $request->session()->get('jwtApiToken');

            return view('admin.staff.list', compact('jwtToken'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function administratorList(Request $request)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $jwtToken = $request->session()->get('jwtApiToken');

            return view('admin.administrator.list', compact('jwtToken'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function administratorCreate(Request $request)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $jwtToken = $request->session()->get('jwtApiToken');

            return view('admin.administrator.create', compact('jwtToken'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function administratorDetail(Request $request, $administrator_id)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $jwtToken = $request->session()->get('jwtApiToken');
            $administratorId = $administrator_id;

            return view('admin.administrator.detail', compact('jwtToken', 'administratorId'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }
    
    public function administratorEdit(Request $request, $administrator_id)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $jwtToken = $request->session()->get('jwtApiToken');
            $administratorId = $administrator_id;

            return view('admin.administrator.edit', compact('jwtToken', 'administratorId'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function staffCreate(Request $request)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $jwtToken = $request->session()->get('jwtApiToken');

            return view('admin.staff.create', compact('jwtToken'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function staffDetail(Request $request, $staff_id)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $jwtToken = $request->session()->get('jwtApiToken');
            $staffId = $staff_id;

            return view('admin.staff.detail', compact('jwtToken', 'staffId'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }

    public function staffEdit(Request $request, $staff_id)
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $jwtToken = $request->session()->get('jwtApiToken');
            $staffId = $staff_id;

            return view('admin.staff.edit', compact('jwtToken', 'staffId'));
        } else {
            return view('admin.dashboard.no-access');
        }
    }





}
