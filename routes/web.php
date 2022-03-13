<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
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

//Route::prefix('cms')->middleware('guest:web,admin')->group(function () {
//    Route::get('{guard}/login', [AuthController::class, 'showLogin'])->name('cms.login');
//    Route::post('login', [AuthController::class, 'login']);
//});

Route::middleware('guest:web,admin')->group(function () {
     Route::get('{guard}/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function(){
    Route::view('dashboard','dashboard.index')->name('dashboard');
    Route::resource('admins', AdminController::class);
    Route::resource('users',UserController::class)->except('show');
    Route::resource('permissions',PermissionController::class)->except('show');
    Route::resource('roles', RoleController::class);
    Route::post('role/update-permission', [RoleController::class, 'updateRolePermission']);

});
Route::middleware('auth:web,admin')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
