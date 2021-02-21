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

Route::group(['middleware' => ['role:patient']], function() {
    Route::get('dashboard', 'AdminController@dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin|staff']], function() {
    Route::get('dashboard', 'AdminController@dashboard');
    Route::get('clinic/list', 'AdminController@clinicList');
    Route::get('clinic/create', 'AdminController@clinicCreate');
    Route::get('branch/list', 'AdminController@branchList');
    Route::get('branch/list/{clinic_id}', 'AdminController@branchList');
    Route::get('branch/detail/{branch_id}', 'AdminController@branchDetail');
    Route::get('branch/create/{clinic_id}', 'AdminController@branchCreate');
    Route::get('branch/price/{branch_id}', 'AdminController@priceList');
    Route::get('branch/price/{branch_id}/prescription/add', 'AdminController@addPrescription');
    Route::get('branch/price/{branch_id}/prescription/edit/{prescription_id}', 'AdminController@editPrescription');
    Route::get('branch/price/{branch_id}/action/add', 'AdminController@addAction');
    Route::get('branch/price/{branch_id}/action/edit/{action_id}', 'AdminController@editAction');
    Route::get('branch/price/{branch_id}/item/add', 'AdminController@addItem');
    Route::get('branch/price/{branch_id}/item/edit/{item_id}', 'AdminController@editItem');
    Route::get('doctor/create', 'AdminController@doctorCreate');
    Route::get('doctor/list', 'AdminController@doctorList');
    Route::get('staff/create', 'AdminController@staffCreate');
    Route::get('staff/list', 'AdminController@staffList');
    Route::get('role/list', 'AdminController@roleList');
    Route::get('staff/list', 'AdminController@staffList');
});


// Dummy
Route::get('new-register', 'TempController@newRegister');
Route::get('/company', 'AdminController@company');                  //moved
Route::get('/list-company', 'AdminController@listCompany');         //moved