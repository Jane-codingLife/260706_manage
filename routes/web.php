<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\adminController;

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'checkId'])->name('checkId');
Route::get('index', [LoginController::class, 'welcome'])->name('welcome');//->middleware('manage')
// Route::get('logout', [LoginController::class, 'logout'])->name('logout');
// Route::resource('admin', adminController::class)->middleware('manage');

