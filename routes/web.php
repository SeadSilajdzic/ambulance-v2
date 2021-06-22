<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\RequestedAppointmentController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::resource('/requestappointment', RequestedAppointmentController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    //Admin controller
    Route::resource('/admin', AdminController::class);

    //Users controller
    Route::get('/users/restore/{id}', [UsersController::class, 'restore'])->name('users.restore');
    Route::get('/users/trash/{user}', [UsersController::class, 'trash'])->name('users.trash');
    Route::get('/users/trashed/', [UsersController::class, 'trashedUsers'])->name('users.trashed');
    Route::resource('/users', UsersController::class);

    //Patient controller
    Route::resource('/patients', PatientsController::class);

    //Appointment controller
    Route::get('/emr/{id}', [AppointmentsController::class, 'emr'])->name('appointments.emr');
    Route::resource('/appointments', AppointmentsController::class);

    //Reception controller
    Route::get('/reception/approve/{appointment}', [ReceptionController::class, 'appointment_approve'])->name('reception.approve');
    Route::get('/reception/{appointment}/edit', [ReceptionController::class, 'edit'])->name('reception.edit');
    Route::put('/reception/{appointment}', [ReceptionController::class, 'update'])->name('reception.update');
    Route::get('/reception', [ReceptionController::class, 'index'])->name('reception.index');
});

