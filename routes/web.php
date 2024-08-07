<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Middleware\EnsureValidRole;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
Route::get('/vehicle/{nopol}', [HomeController::class, 'getVehicleWithUser'])->name('vehicle');
Route::post('/booking-form', [HomeController::class, 'store'])->name('booking.pages');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('booking', [BookingController::class, 'index'])->name('booking');
    Route::post('booking', [BookingController::class, 'update'])->name('booking.process');
    Route::post('booking-done', [BookingController::class, 'doneService'])->name('booking.done');
    Route::middleware('role:owner')->get('users', [UserController::class, 'index'])->name('users');
    Route::middleware('role:owner')->get('report', [ReportController::class, 'index'])->name('report');
    Route::middleware('role:owner')->get('print', [ReportController::class, 'print'])->name('print');
    Route::post('users', [UserController::class, 'store'])->name('register.user');
    Route::delete('users', [UserController::class, 'destroy'])->name('delete.user');
    Route::get('mechanics', [UserController::class, 'mechanic'])->name('mechanics');
    Route::post('mechanics', [UserController::class, 'storeMechanic'])->name('add.mechanic');
    Route::delete('mechanics', [UserController::class, 'destroyMechanic'])->name('delete.mechanics');
    // Route::group(['prefix' => 'components', 'as' => 'components.'], function() {
    //     Route::get('/alert', function () {
    //         return view('admin.component.alert');
    //     })->name('alert');
    //     Route::get('/accordion', function () {
    //         return view('admin.component.accordion');
    //     })->name('accordion');
    // });
});