<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


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

Route::get('register', 'Auth\RegisterController@getregdata')->name('register');
Route::post('register', 'Auth\RegisterController@create');

Route::get('/login', 'Auth\LoginController@getLogin')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate');

Route::get('/logout', 'Auth\LoginController@logout');















//-------------User Section with Login-----------------

Route::get('/dashboard', [DashboardController::class, 'show']);

// Route::get('/', function () {
//     session()->forget('user');
//         return view('login_User');
// });

// Route::post('/', [HomeController::class, 'postuserLogin'])->name('user');

//-------------User Registration------------
// Route::get('/user-reg', function () {
//     return view('registration');
// });
// Route::post('/user-reg', [HomeController::class, 'postuserregister'])->name('register');


//-------------Admin Section-----------------

Route::get('/admin', function () {
    session()->forget('email');
    return view('logIn_Admin');
});
Route::post('/admin', [HomeController::class, 'postAdminLogin'])->name('admin');


Route::prefix('admin-dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/user', [DashboardController::class, 'create']);
    Route::get('/edituser/{id}', [DashboardController::class, 'store']);
    Route::post('/edituser/{id}', [DashboardController::class, 'update']);
    Route::get('/delete/{id}', [DashboardController::class, 'destroy']);
});


//-------------Active Link By Admin-----------------
Route::get('/useractive/{id}', [HomeController::class, 'userActive']);

