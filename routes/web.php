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


// Route::get('/list-appointment', 'AppointmentController@redirect');
Route::get('new-register', 'TempController@newRegister');

Route::get('list-appointment', 'AppointmentController@listAppointment');
Route::get('patient-dashboard', 'PatientController@patientDashboard');
Route::get('soap', 'SoapController@form');
Route::get('patient-history', 'PatientController@patientHistory');

Route::get('medication-history', 'MedicationController@medicationHistory');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');


Route::get('/company', 'AdminController@company');          //moved
// Route::get('/company2', 'AdminController@company2');
Route::get('/list-company', 'AdminController@listCompany'); //moved

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Route::get('check-user-list', 'TestController@checkUserList');  //testing purpose

///////////////
Route::get('/branch', 'AdminController@branch');            //need to  move
Route::get('/branch-list', 'AdminController@branchlist2');   //need to move

Route::get('/roles', 'AdminController@roles');

Route::get('/users', 'AdminController@users');

Route::get('/doctor-list', 'AdminController@doctor');

Route::get('/prescription', 'AdminController@prescription');    // price

Route::get('/add-role', 'AdminController@addrole');

Route::get('/add-user','AdminController@adduser');

Route::get('/add-doctor', 'AdminController@adddoctor');

Route::get('/add-prescription', 'AdminController@addprescript');
////////////////////



Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('clinic/list', 'AdminController@clinicList');
    Route::get('clinic/create', 'AdminController@clinicCreate');
    Route::get('branch/list', 'AdminController@branchList');
    Route::get('branch/list/{clinic_id}', 'AdminController@branchList');
    Route::get('branch/create/{clinic_id}', 'AdminController@branchCreate');
    Route::get('prescription/list', 'AdminController@prescriptionList');
});



// Auth::routes();
