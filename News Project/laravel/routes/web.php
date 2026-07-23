<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;




Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/article/{slug}', [HomeController::class, 'show'])
    ->name('news.show');


Route::get('/register', [AuthController::class, 'Registeration'])->name('register');
Route::post('/register', [AuthController::class, 'Register']);

Route::get('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/login', [AuthController::class, 'Log']);

Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('dashboard');

        Route::resource('articles', ArticleController::class);

    });
