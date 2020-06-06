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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'AppointmentController@redirect');

Route::get('list-appointment', 'AppointmentController@listAppointment');

Route::get('patient-dashboard', 'PatientController@patientDashboard');

Route::get('soap', 'SoapController@form');

Route::get('patient-history', 'PatientController@patientHistory');

Route::get('medication-history', 'MedicationController@medicationHistory');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
