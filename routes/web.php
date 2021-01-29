<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RenterController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('renters', RenterController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    //Route::resource('tasks', \App\Http\Controllers\TasksController::class);

    Route::resource('users', \App\Http\Controllers\UsersController::class);
    Route::resource('renters', \App\Http\Controllers\RenterController::class);
    Route::resource('flats', \App\Http\Controllers\FlatController::class);
    Route::resource('meters', \App\Http\Controllers\MeterController::class);
    Route::resource('meter_state', \App\Http\Controllers\MeterStateController::class);
    Route::resource('bills', \App\Http\Controllers\BillController::class);
    Route::resource('contracts', \App\Http\Controllers\ContractController::class);
});
