<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PerformerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::resource('cinema', CinemaController::class)->middleware('can:cinema');
    Route::resource('user', UserController::class)->middleware('can:user');
    Route::resource('group', GroupController::class)->middleware('can:group');

    Route::get('permission/{group}', [GroupController::class, 'permission'])->name('group.permission');
    Route::post('permission/{group}', [GroupController::class, 'postPermission']);
    Route::resource('director', DirectorController::class)->middleware('can:director');
    Route::resource('room', RoomController::class)->middleware('can:room');
    Route::resource('performer', PerformerController::class)->middleware('can:performer');
    Route::resource('movie', MovieController::class)->middleware('can:movie');
    Route::resource('category', CategoryController::class)->middleware('can:category');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});