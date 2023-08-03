<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\User\PermissionController as UserPermissionController;




Route::get('/', [AdminController::class, 'index']);


Route::resource('/users','App\Http\Controllers\Admin\User\UserController');
Route::get('/users',[UserController::class,'index'])-> name("admin.users.index");
Route::get('/users/create',[UserController::class,'create'])-> name("admin.users.create");
Route::post('/users/store',[UserController::class,'store'])-> name("admin.users.store");
Route::get('/users/{id}/edit/',[UserController::class,'edit'])-> name("admin.users.edit");
Route::patch('/users/{id}/update',[UserController::class,'update'])-> name("admin.users.update");
Route::delete('/users/{id}/destroy',[UserController::class,'destroy'])-> name('admin.users.destroy');

Route::get('/users/{user}/permissions',[UserPermissionController::class,'create'])->name('admin.users.permissions')->middleware('can:staff_user_permission');
Route::post('/users/{user}/permissions',[UserPermissionController::class,'store'])->name('admin.users.permissions.store')->middleware('can:staff_user_permission');;


Route::resource('/permissions','App\Http\Controllers\Admin\PermissionController');
Route::get('/permissions',[PermissionController::class,'index'])-> name("admin.permissions.index");
Route::delete('/permissions/{id}/destroy',[PermissionController::class,'destroy'])-> name('admin.permissions.destroy');
Route::get('/permissions/{id}/edit/',[PermissionController::class,'edit'])-> name("admin.permissions.edit");
Route::get('/permissions/create',[PermissionController::class,'create'])-> name("admin.permissions.create");
Route::post('/permissions/store',[PermissionController::class,'store'])-> name("admin.permissions.store");
Route::patch('/permissions/{id}/update',[PermissionController::class,'update'])-> name("admin.permissions.update");


Route::resource('/roles','App\Http\Controllers\Admin\RoleController');
Route::get('/roles',[RoleController::class,'index'])-> name("admin.roles.index");
Route::delete('/roles/{id}/destroy',[RoleController::class,'destroy'])-> name('admin.roles.destroy');
Route::get('/roles/{id}/edit/',[RoleController::class,'edit'])-> name("admin.roles.edit");
Route::get('/roles/create',[RoleController::class,'create'])-> name("admin.roles.create");
Route::post('/roles/store',[RoleController::class,'store'])-> name("admin.roles.store");
Route::patch('/roles/{id}/update',[RoleController::class,'update'])-> name("admin.roles.update");

