<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\RecordController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\MasterMiddleware;
use App\Http\Middleware\SignUpMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'show_master'])->name('index');

Route::get('cabinet/{user}', [MasterController::class, 'show_master_cab']);

// Route::get('cabinet/{user}', [MasterController::class, 'usermaster']);


// Route::get('/', [IndexController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('home', [IndexController::class, 'home_cat'])->name('asd');

// Route::get('home', [IndexController::class, 'show_master_as'])->name('home');
// Route::get('home', [IndexController::class, 'categ'])->name('home');


Route::get('master-page/sign-up/{schedule}', [RecordController::class, 'createRecord'])->middleware(SignUpMiddleware::class);

Route::get('delete-record/{record}', [RecordController::class, 'deleteRecord'])->name('delete-record');

Route::post('update-user/{user}', [HomeController::class, 'updateUser'])->name('update-user');

Route::get('master-page/{user}', [IndexController::class, 'masterPage']);


Route::group(['prefix'=>'admin'], function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::post('add-category', [AdminController::class, 'add'])->name('add-category');
    Route::post('edit-category/{category}', [AdminController::class, 'editCategory']);
    Route::get('delete-category/{category}', [AdminController::class, 'deleteCategory']);
    Route::post('add-master', [AdminController::class, 'addMaster'])->name('add-master');
    Route::get('delete-master/{user}', [AdminController::class, 'deleteMaster']);
})->middleware('admin');

Route::group(['prefix'=>'master'], function(){
    Route::get('/cabinet', [MasterController::class, 'show_master_cab']);
    Route::get('/cabinet/{sort}', [MasterController::class, 'show_master_cab']);
    Route::get('add-schedule-form', [MasterController::class, 'viewAddSchedule'])->name('add');
    Route::post('add-shedule', [MasterController::class, 'addSchedule'])->name('add-shedule');
    Route::get('delete-schedule/{schedule}', [MasterController::class, 'deleteSchedule']);

})->middleware('master');

