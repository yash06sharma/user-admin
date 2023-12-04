<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\User;
use Illuminate\Support\Facades\Auth;


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


//-----------__Auth Section-----------------

Route::get('register', [HomeController::class, 'create'])->name('register');
Route::post('register', [HomeController::class, 'store']);

Route::get('/login', 'Auth\LoginController@getLogin')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate');

Route::get('/logout', 'Auth\LoginController@logout');




//-------------User Section with Login-----------------

Route::get('/dashboard', [HomeController::class, 'index']);


//-------------Admin Section-----------------



Route::prefix('admin-dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('/user', [DashboardController::class, 'create']);
        Route::get('/edituser/{id}', [DashboardController::class, 'store']);
        Route::post('/edituser/{id}', [DashboardController::class, 'update']);
        Route::get('/delete/{id}', [DashboardController::class, 'destroy']);

        Route::get('/editpreuser/{id}', [DashboardController::class, 'editPre']);
        Route::post('/editpreuser/{id}', [DashboardController::class, 'updatePre']);
        Route::get('/deleted/{id}', [DashboardController::class, 'PreDelete']);

});



//-------------Active Link By Admin-----------------
Route::get('/useractive/{id}', [HomeController::class, 'show']);

