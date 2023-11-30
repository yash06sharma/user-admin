<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
//-------------User Section with Login-----------------

Route::get('/user-dashboard', [HomeController::class, 'show']);

Route::get('/', function () {
    session()->forget('user');
        return view('login_User');
});

Route::post('/', [HomeController::class, 'postuserLogin'])->name('user');

//-------------User Registration------------
Route::get('/user-reg', function () {
    return view('registration');
});
Route::post('/user-reg', [HomeController::class, 'postuserregister'])->name('register');


//-------------Admin Section-----------------

Route::get('/admin', function () {
    session()->forget('email');
    return view('logIn_Admin');
});
Route::post('/admin', [HomeController::class, 'postAdminLogin'])->name('admin');


Route::prefix('admin-dashboard')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/user', [HomeController::class, 'create']);
    Route::get('/edituser/{id}', [HomeController::class, 'store']);
    Route::post('/edituser/{id}', [HomeController::class, 'update']);
    Route::get('/delete/{id}', [HomeController::class, 'edit']);
});


//-------------Active Link By Admin-----------------
Route::get('/useractive/{id}', [HomeController::class, 'userActive']);

