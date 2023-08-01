<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;




Route::get('/', [AdminController::class, 'index']);


Route::get('/users',[UserController::class,'index']);