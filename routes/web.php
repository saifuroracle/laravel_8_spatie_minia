<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\CommonController;


// Set default session language if none is set
if(!Session::has('language'))
{
    Session::put('language', 'bn');
}





// Backend
Route::get('/login',  [AuthController::class, 'login'])->name('login');
Route::post('/loginPost',  [AuthController::class, 'loginPost'])->name('loginPost');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('users', UserController::class, ['names' => 'admin.users']);
    Route::resource('roles', RoleController::class, ['names' => 'admin.roles']);
});


Route::get('clear-session/{session_name}', [CommonController::class, 'clearSession']);
