<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'auth_login']);

Route::get('register', [AuthController::class, 'register'])->name('register');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'superadmin'], function () {

  Route::get('panel/dashboard', [DashboardController::class, 'dashboard'])->name('panel.dashboard');

  Route::get('panel/role', [RoleController::class, 'list'])->name('panel.role');
  Route::get('panel/role/add', [RoleController::class, 'add'])->name('panel.role.add');
  Route::post('panel/role/add', [RoleController::class, 'store'])->name('panel.role.store');
  Route::get('panel/role/edit/{id}', [RoleController::class, 'edit'])->name('panel.role.edit');
  Route::put('panel/role/update', [RoleController::class, 'update'])->name('panel.role.update');
  Route::delete('panel/role/delete/{id}', [RoleController::class, 'delete'])->name('panel.role.delete');

  Route::get('panel/user', [UserController::class, 'list'])->name('panel.user');
  Route::get('panel/user/add', [UserController::class, 'add'])->name('panel.user.add');
  Route::post('panel/user/add', [UserController::class, 'store'])->name('panel.user.store');
  Route::get('panel/user/edit/{id}', [UserController::class, 'edit'])->name('panel.user.edit');
  Route::put('panel/user/update', [UserController::class, 'update'])->name('panel.user.update');
  Route::delete('panel/user/delete/{id}', [UserController::class, 'delete'])->name('panel.user.delete');
});

Route::group(['middleware' => 'admin'], function () {});

Route::group(['middleware' => 'user'], function () {});
