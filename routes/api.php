<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Employee\EmployeeController;
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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function () {
    Route::get('me', [UserController::class, 'userProfile']);
    Route::post('me/update-password', [UserController::class, 'updatedpassword']);
    Route::get('/company', [CompanyController::class, 'index']);
    Route::get('/company/{company}', [CompanyController::class, 'show']);
    Route::put('/company/{company}', [CompanyController::class, 'update']);
    Route::post('/company', [CompanyController::class, 'store']);
    Route::delete('/company/{company}', [CompanyController::class, 'destroy']);
    Route::get('/employee', [EmployeeController::class, 'index']);
    Route::get('/employee/{employee}', [EmployeeController::class, 'show']);
    Route::put('/employee/{employee}', [EmployeeController::class, 'update']);
    Route::post('/employee', [EmployeeController::class, 'store']);
    Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy']);
});
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);