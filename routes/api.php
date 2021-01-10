<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [
    'as' => 'login.login',
    'uses' => 'Api\Auth\LoginController@login',
]);

Route::get('refresh', [
    'as'    => 'login.refresh',
    'uses'  => 'Api\Auth\LoginController@login'
]);

Route::get('/user/self', [
    'as'    => 'user.self',
    'uses'  => 'Api\DoctorController@self'
]);

Route::get('/jwt/get-current-token', [
    'as'    => 'jwt.getCurrentToken',
    'uses'  => 'Api\SessionController@getJWTToken'
]);

Route::name('doctor.')->prefix('doctor')->group(function () {
    Route::post('create', [
        'as'    => 'doctor.create',
        'uses'  => 'Api\DoctorController@create'
    ]);

    Route::get('list', [
        'as'    => 'doctor.list',
        'uses'  => 'Api\DoctorController@doctorList'
    ]);

    Route::get('delete/{id}', [
        'as'    => 'doctor.delete',
        'uses'  => 'Api\DoctorController@delete'
    ]);

    Route::post('update/{id}', [
        'as'    => 'doctor.update',
        'uses'  => 'Api\DoctorController@update'
    ]);
});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::post('clinic/store', [
        'as'    => 'admin.createclinic',
        'uses'  => 'Api\ClinicController@store'
    ]);

    Route::get('clinic/list', [
        'as'    => 'admin.getclinic',
        'uses'  => 'Api\ClinicController@list'
    ]);

    Route::get('branch/list', [
        'as'    => 'admin.getbranch',
        'uses'  => 'Api\BranchController@list'
    ]);
});


Route::get('/get-company-list', 'Api\CompanyController@getCompanyList');

Route::get('/get-company-detail', 'Api\CompanyController@getCompanyDetail');

// Route::get('/patient-list', 'Api\PatientCoan')

