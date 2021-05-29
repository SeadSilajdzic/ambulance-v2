<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('/admin', AdminController::class);

    Route::get('/users/restore/{id}', [UsersController::class, 'restore'])->name('users.restore');
    Route::get('/users/trash/{user}', [UsersController::class, 'trash'])->name('users.trash');
    Route::get('/users/trashed/', [UsersController::class, 'trashedUsers'])->name('users.trashed');
    Route::resource('/users', UsersController::class);


});

