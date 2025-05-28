<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index'])->name('home');
Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail_movie'])->name('movies.detail');

Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/search', [MovieController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail_movie']);
    Route::get('/movie/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movie/store', [MovieController::class, 'store'])->name('movies.store');

    Route::get('/movie/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movie/{id}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movie/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

    Route::get('/datamovie', [MovieController::class, 'datamovie'])->name('datamovie');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
