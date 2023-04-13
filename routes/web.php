<?php

use App\Http\Controllers;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/dashboard', Controllers\DashboardController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/update/records', [DashboardController::class, 'update'])->name('dash.update');
    Route::delete('/delete/record', [DashboardController::class, 'destroy'])->name('dash.destroy');
    Route::get('/zone/{zone}', [DashboardController::class, 'zone'])->name('dash.zone');
    Route::delete('/delete/zone', [DashboardController::class, 'zoneDestroy'])->name('zone.destroy');
});

require __DIR__.'/auth.php';
