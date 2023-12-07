<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('schedule', [HomeController::class, 'schedule'])->name('schedule');

// Route::get('/home',[HomeController::class, 'schedule_'])->name('schedule_');

Route::get('add-schedule', [HomeController::class, 'addSchedule'])->name('add');

Route::post('add-category', [HomeController::class, 'add'])->name('add-category');

Route::post('edit-category/{id}', [HomeController::class, 'editCategory']);