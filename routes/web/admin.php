<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;




Route::get('/', [AdminController::class, 'index']);


Route::resource('/users','App\Http\Controllers\Admin\UserController');

Route::get('/users',[UserController::class,'index'])-> name("admin.users.index");
Route::get('/users/create',[UserController::class,'create'])-> name("admin.users.create");
Route::post('/users/store',[UserController::class,'store'])-> name("admin.users.store");
Route::get('/users/{id}/edit/',[UserController::class,'edit'])-> name("admin.users.edit");
Route::patch('/users/{id}/update',[UserController::class,'update'])-> name("admin.users.update");


