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

Route::get('/get-company-list', 'Api\CompanyController@getCompanyList');

Route::get('/get-company-detail', 'Api\CompanyController@getCompanyDetail');

// Route::get('/patient-list', 'Api\PatientCoan')

Route::get('/doctor/list', 'Api\DoctorController@doctorList');
