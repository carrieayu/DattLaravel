<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PersonalInforController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/userInfo', [AuthController::class, 'index']);
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/personalInfo', [PersonalInforController::class, 'store']);
    Route::get('/getPersonalInfo', [PersonalInforController::class, 'index']);
    Route::put('/updatePersonalInfo/{id}', [PersonalInforController::class, 'update']);

    Route::post('/logout', [AuthController::class, 'logout']);
});