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
    Route::delete('/delete/records', [DashboardController::class, 'destroy'])->name('dash.destroy');
    Route::get('/zone/{zone}', [DashboardController::class, 'zone'])->name('dash.zone');
});

if (env('APP_DEBUG') == true) {
    Route::get('/redis', function() {
        /* foreach(Redis::keys("*") as $zone) {
            foreach(Redis::hgetall($zone) as $record => $details) {
                echo $record.".".$zone."<br />";
                foreach(json_decode($details, true) as $type => $options) {
                    if ($type == "txt") {
                       echo $type ." " .$options[0]['ttl'] ." ". $options[0]['text']."</br />";
                    }
                    if ($type == "mx") {
                        echo $type ." " .$options[0]['ttl'] ." ". $options[0]['host']." ".$options[0]['preference']."</br />";
                    }
                    if ($type == "a") {
                       echo $type ." " .$options[0]['ttl'] ." ". $options[0]['ip']."</br />";
                    }
                    if ($type == "aaaa") {
                        echo $type ." " .$options[0]['ttl'] ." ". $options[0]['ip']."</br />";
                    }
                    if ($type == "cname") {
                        echo $type ." " .$options[0]['ttl'] ." ". $options[0]['host']."</br />";
                    }
                    if ($type == "ns") {
                        echo $type ." " .$options[0]['ttl'] ." ". $options[0]['host']."</br />";
                    }
                }
            }
        } */
       return json_encode(["mx" => [
        array('ttl' => 3600, 'preference' => 10, 'host' => "mx.google.com")
    ]]);
    });
}

require __DIR__.'/auth.php';
