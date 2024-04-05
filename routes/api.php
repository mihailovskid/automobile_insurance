<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('get-vehicles', [VehicleController::class, 'index']);
Route::post('create-vehicle', [VehicleController::class, 'store']);
Route::get('get-vehicle', [VehicleController::class, 'show']);
Route::put('update-vehicle', [VehicleController::class, 'update']);
Route::delete('delete-vehicle', [VehicleController::class, 'destroy']);
