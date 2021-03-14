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

Route::name('admin.')->prefix('admin')->group(function () {
    Route::post('clinic/store', [
        'as'    => 'admin.createclinic',
        'uses'  => 'Api\ClinicController@store'
    ]);

    Route::get('clinic/list', [
        'as'    => 'admin.getclinic',
        'uses'  => 'Api\ClinicController@list'
    ]);

    Route::get('clinic/list/for-options', [
        'as'    => 'admin.getclinicforoptions',
        'uses'  => 'Api\ClinicController@listForOptions'
    ]);

    Route::get('branch/list', [
        'as'    => 'admin.getbranch',
        'uses'  => 'Api\BranchController@list'
    ]);

    Route::post('branch/store/{clinic_id}', [
        'as'    => 'admin.createbranch',
        'uses'  => 'Api\BranchController@store'
    ]);

    Route::get('branch/detail/{branch_id}', [
        'as'    => 'admin.detailbranch',
        'uses'  => 'Api\BranchController@detail'
    ]);

    Route::get('branch/price/prescription', [
        'as'    => 'admin.branchPricePrescription',
        'uses'  => 'Api\PriceController@prescriptionPrice'
    ]);

    Route::get('branch/price/action', [
        'as'    => 'admin.branchPriceAction',
        'uses'  => 'Api\PriceController@actionPrice'
    ]);

    Route::get('branch/price/item', [
        'as'    => 'admin.branchPriceItem',
        'uses'  => 'Api\PriceController@itemPrice'
    ]);

    Route::post('branch/price/{branch_id}/prescription/add', [
        'as'    => 'admin.branchPricePrescriptionAdd',
        'uses'  => 'Api\PriceController@prescriptionPriceAdd'
    ]);

    Route::post('branch/price/{branch_id}/prescription/update', [
        'as'    => 'admin.branchPricePrescriptionUpdate',
        'uses'  => 'Api\PriceController@prescriptionPriceUpdate'
    ]);

    Route::post('branch/price/{branch_id}/action/add', [
        'as'    => 'admin.branchPriceActionAdd',
        'uses'  => 'Api\PriceController@actionPriceAdd'
    ]);

    Route::post('branch/price/{branch_id}/action/update', [
        'as'    => 'admin.branchPriceActionUpdate',
        'uses'  => 'Api\PriceController@actionPriceUpdate'
    ]);

    Route::post('branch/price/{branch_id}/item/add', [
        'as'    => 'admin.branchPriceItemAdd',
        'uses'  => 'Api\PriceController@itemPriceAdd'
    ]);

    Route::post('branch/price/{branch_id}/item/update', [
        'as'    => 'admin.branchPriceItemUpdate',
        'uses'  => 'Api\PriceController@itemPriceUpdate'
    ]);

    Route::get('branch/price/{branch_id}/{item_type}/delete/{item_id}', [
        'as'    => 'admin.branchPriceDelete',
        'uses'  => 'Api\PriceController@priceDelete'
    ]);

    Route::get('role/list', [
        'as'    => 'admin.roleList',
        'uses'  => 'Api\RoleController@roleList'
    ]);

    // Doctor API
    Route::prefix('doctor')->group(function () {
        Route::get('detail', [
            'as'    => 'doctor.detail',
            'uses'  => 'Api\DoctorController@detail'
        ]);

        Route::post('create', [
            'as'    => 'doctor.create',
            'uses'  => 'Api\DoctorController@create'
        ]);
    
        Route::get('list', [
            'as'    => 'doctor.list',
            'uses'  => 'Api\DoctorController@list'
        ]);
    
        Route::post('delete', [
            'as'    => 'doctor.delete',
            'uses'  => 'Api\DoctorController@delete'
        ]);

        Route::post('update', [
            'as'    => 'doctor.update',
            'uses'  => 'Api\DoctorController@update'
        ]);
    
        Route::post('register', [
            'as'    => 'doctor.register',
            'uses'  => 'Api\DoctorController@register'
        ]);
    });

    // Staff API
    Route::prefix('staff')->group(function () {
        Route::get('detail', [
            'as'    => 'staff.detail',
            'uses'  => 'Api\StaffController@detail'
        ]);

        Route::get('list', [
            'as'    => 'staff.list',
            'uses'  => 'Api\StaffController@list'
        ]);
    
        Route::post('delete', [
            'as'    => 'staff.delete',
            'uses'  => 'Api\StaffController@delete'
        ]);
    
        Route::post('update', [
            'as'    => 'staff.update',
            'uses'  => 'Api\StaffController@update'
        ]);
    
        Route::post('register', [
            'as'    => 'staff.register',
            'uses'  => 'Api\StaffController@register'
        ]);
    });


    // For form purpose
    Route::get('get-available-branch-option', [
        'as'    => 'admin.getAvailableBranchOption',
        'uses'  => 'Api\BranchController@getAvailableBranchOption'
    ]);
    Route::get('get-current-clinic', [
        'as'    => 'admin.getCurrentClinic',
        'uses'  => 'Api\ClinicController@getCurrentClinic'
    ]);
    Route::get('get-available-action-option', [
        'as'    => 'admin.getCurrentClinic',
        'uses'  => 'Api\PriceController@getAvailableActionOption'
    ]);
});


Route::get('/get-company-list', 'Api\CompanyController@getCompanyList');

Route::get('/get-company-detail', 'Api\CompanyController@getCompanyDetail');

// Route::get('/patient-list', 'Api\PatientCoan')

