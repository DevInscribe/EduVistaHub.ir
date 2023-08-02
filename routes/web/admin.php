<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;




Route::get('/', [AdminController::class, 'index']);


Route::resource('/users','App\Http\Controllers\Admin\UserController');

Route::get('/users',[UserController::class,'index'])-> name("admin.users.index");
Route::get('/users/create',[UserController::class,'create'])-> name("admin.users.create");
Route::post('/users/store',[UserController::class,'store'])-> name("admin.users.store");
Route::get('/users/{id}/edit/',[UserController::class,'edit'])-> name("admin.users.edit");
Route::patch('/users/{id}/update',[UserController::class,'update'])-> name("admin.users.update");
Route::delete('/users/{id}/destroy',[UserController::class,'destroy'])-> name('admin.users.destroy');


Route::resource('/permissions','App\Http\Controllers\Admin\PermissionController');
Route::get('/permissions',[PermissionController::class,'index'])-> name("admin.permissions.index");
Route::delete('/permissions/{id}/destroy',[PermissionController::class,'destroy'])-> name('admin.permissions.destroy');
Route::get('/permissions/{id}/edit/',[PermissionController::class,'edit'])-> name("admin.permissions.edit");
Route::get('/permissions/create',[PermissionController::class,'create'])-> name("admin.permissions.create");
Route::post('/permissions/store',[PermissionController::class,'store'])-> name("admin.permissions.store");
