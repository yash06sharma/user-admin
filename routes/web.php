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
Route::get('/admin-reg', [HomeController::class, 'getadminregister']);
Route::post('/admin-reg', [HomeController::class, 'postadmiregister'])->name('register');

Route::get('/admin', [HomeController::class, 'getAdminLogin'])->name('loginadmin');
Route::post('/admin', [HomeController::class, 'postAdminLogin'])->name('admin');


Route::get('/', [HomeController::class, 'getuserLogin']);
Route::post('/', [HomeController::class, 'postuserLogin'])->name('user');


Route::get('/user-reg', [HomeController::class, 'getuserregister']);

Route::post('/user-reg', [HomeController::class, 'postuserregister'])->name('register');

// Admin and User Registartion and Login End-------------

//-------------Admin Dashboard-----------------

Route::get('/user-reg', [HomeController::class, 'getuserregister']);



Route::get('/admin-dashboard', function () {
     $value = session('email');
     if($value != null){
        return view('welcomeAdmin');
     }else{
        return redirect()->route('loginadmin');
     }
});

Route::get('/useractive/{id}', [HomeController::class, 'userActive']);
