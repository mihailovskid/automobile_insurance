<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('', [VehicleController::class, 'showIndexPage'])->name('index');

Route::group(['prefix' => 'vehicles', 'as' => 'vehicles.'], function () {
    Route::get('create', [VehicleController::class, 'create'])->name('create');
    Route::get('edit', [VehicleController::class, 'edit'])->name('edit');
});
