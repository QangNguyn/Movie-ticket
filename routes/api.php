<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MovieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', [AuthController::class, 'login']);



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/refresh-token', [AuthController::class, 'refresh_token']);

    Route::post('/refresh-token', [AuthController::class, 'refreshToken']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::get('/movies/coming-soon', [MovieController::class, 'comingSoon']);
Route::get('/movies/now-playing', [MovieController::class, 'nowPlaying']);
Route::get('/movies/category/{id}', [MovieController::class, 'categoryMovies']);
Route::get('/movies/director/{id}', [MovieController::class, 'directorMovies']);
Route::apiResource('/movies', MovieController::class);
