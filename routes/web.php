<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [HomeController::class, "index"])->name('index');
Route::get('/dashboard', [HomeController::class, "dashboard"])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('vehicles')->group(function () {
    Route::get('/', [VehicleController::class, 'index'])->name('vehicles');
    Route::get('/vehicles', [VehicleController::class, 'list'])->name('vehicles.list');
    Route::post('/vehicles/add', [VehicleController::class, 'add'])->name('vehicles.store');
    Route::delete('/{id}/vehicles', [VehicleController::class, 'delete'])->name('vehicles.delete');
    Route::get('/vehicles/{id}', [VehicleController::class, 'get'])->name('vehicles.get');
    Route::post('/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
});