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
//-------------User Section-----------------

Route::get('/user-dashboard', [HomeController::class, 'show']);
Route::get('/', [HomeController::class, 'getuserLogin']);
Route::post('/', [HomeController::class, 'postuserLogin'])->name('user');
Route::get('/user-reg', [HomeController::class, 'getuserregister']);
Route::post('/user-reg', [HomeController::class, 'postuserregister'])->name('register');


//-------------Admin Section-----------------


Route::get('/admin', [HomeController::class, 'getAdminLogin'])->name('loginadmin');
Route::post('/admin', [HomeController::class, 'postAdminLogin'])->name('admin');

Route::get('/admin-dashboard', [HomeController::class, 'index']);
Route::get('/admin-dashboard/user', [HomeController::class, 'create']);

Route::get('/admin-dashboard/edituser/{id}', [HomeController::class, 'store']);
Route::post('/admin-dashboard/edituser/{id}', [HomeController::class, 'update']);

Route::get('/admin-dashboard/delete/{id}', [HomeController::class, 'edit']);



//-------------Active Link By Admin-----------------
Route::get('/useractive/{id}', [HomeController::class, 'userActive']);

