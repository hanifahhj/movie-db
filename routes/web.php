<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index']);

Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail_movie']);

Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/search', [MovieController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/movie/create', [MovieController::class, 'create']);
    Route::post('/movie/store', [MovieController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
