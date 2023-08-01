<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;




Route::get('/', [AdminController::class, 'index']);


Route::get('/users',[UserController::class,'index'])->name("admin.users.index");
Route::get('/users/create',[UserController::class,'create'])->name("admin.users.create");
Route::post('/users/store',[UserController::class,'store'])->name("admin.users.store");
