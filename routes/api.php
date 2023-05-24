<?php

use App\Http\Controllers\AiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ForgetPasswordController;
use App\Http\Controllers\Api\RessetPasswordController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IotController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});


Route::controller(IotController::class)->group(function (){
    Route::post('/Iot','store');
    Route::get('/Iot','show');
    Route::get('/total','total');
    Route::get('/DeviceOne','deviceOne');
    Route::get('/DeviceTwo','deviceTwo');
    Route::get('/total_money','totalMoney');
});




Route::controller(AiController::class)->group(function (){
    Route::post('/Ai','storeing');
    Route::get('/Iot','show');
    Route::get('/Ai_mobile','showing');
});


Route::post('forgot-password',[ForgetPasswordController::class,'forgetpassword']);
Route::post('reset-password',[RessetPasswordController::class,'passwordReset']);























