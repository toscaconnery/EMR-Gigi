<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Redirector
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

// Main doctor page
Route::get('list-appointment', 'AppointmentController@listAppointment');
Route::get('patient-dashboard', 'PatientController@patientDashboard');
Route::get('soap', 'SoapController@form');
Route::get('patient-history', 'PatientController@patientHistory');
Route::get('medication-history', 'MedicationController@medicationHistory');

Route::group(['prefix' => 'download'], function() {
    Route::get('/medical-resume', 'FileController@medicalResume');
});

Route::group(['middleware' => ['role:patient']], function() {
    Route::get('dashboard', 'AdminController@dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:superadmin|admin|staff']], function() {
    Route::get('dashboard', 'AdminController@dashboard');

    // Clinics
    Route::get('clinic/list', 'AdminController@clinicList');
    Route::get('clinic/create', 'AdminController@clinicCreate');

    // Branch
    Route::get('branch/list', 'AdminController@branchList');
    Route::get('branch/list/{clinic_id}', 'AdminController@branchList');
    Route::get('branch/detail/{branch_id}', 'AdminController@branchDetail');
    Route::get('branch/create', 'AdminController@branchCreate');

    // Price
    Route::get('branch/price/{branch_id}', 'AdminController@priceList');
    Route::get('branch/price/{branch_id}/prescription/add', 'AdminController@addPrescription');
    Route::get('branch/price/{branch_id}/prescription/edit/{prescription_id}', 'AdminController@editPrescription');
    Route::get('branch/price/{branch_id}/action/add', 'AdminController@addAction');
    Route::get('branch/price/{branch_id}/action/edit/{action_id}', 'AdminController@editAction');
    Route::get('branch/price/{branch_id}/item/add', 'AdminController@addItem');
    Route::get('branch/price/{branch_id}/item/edit/{item_id}', 'AdminController@editItem');

    // Doctor
    Route::get('doctor/create', 'AdminController@doctorCreate');
    Route::get('doctor/list', 'AdminController@doctorList');
    Route::get('doctor/detail/{doctor_id}', 'AdminController@doctorDetail');
    Route::get('doctor/edit/{doctor_id}', 'AdminController@doctorEdit');

    // Staff
    Route::get('staff/create', 'AdminController@staffCreate');
    Route::get('staff/list', 'AdminController@staffList');
    Route::get('staff/detail/{staff_id}', 'AdminController@staffDetail');
    Route::get('staff/edit/{staff_id}', 'AdminController@staffEdit');

    // Administrator
    Route::get('administrator/create', 'AdminController@administratorCreate');
    Route::get('administrator/list', 'AdminController@administratorList');
    Route::get('administrator/detail/{administrator_id}', 'AdminController@administratorDetail');
    Route::get('administrator/edit/{administrator_id}', 'AdminController@administratorEdit');

    Route::get('role/list', 'AdminController@roleList');

    // Reports
    Route::get('reports/revenue', 'AdminController@revenueView');
});


// Dummy
// Route::get('new-register', 'TempController@newRegister');
// Route::get('/company', 'AdminController@company');                  //moved
// Route::get('/list-company', 'AdminController@listCompany');         //moved

///////////////

// Route::get('/users', 'AdminController@users');
// Route::get('/add-user','AdminController@adduser');

// Route::get('/branch', 'AdminController@branch');                    // done
// Route::get('/branch-list', 'AdminController@branchlist2');          // done
// Route::get('/add-prescription', 'AdminController@addprescript');    // done
// Route::get('/prescription', 'AdminController@prescription');        // done
// Route::get('/add-doctor', 'AdminController@adddoctorx');            // done
// Route::get('/doctor-list', 'AdminController@doctor');               // done
// Route::get('/roles', 'AdminController@roles');                      // done
// Route::get('/add-role', 'AdminController@addrole');                 // ignored