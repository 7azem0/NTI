<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;



Route::get('/', [HomeController::class, 'index'])
    ->name('home');


Route::get('/register', [AuthController::class, 'Registeration'])->name('register');
Route::post('/register', [AuthController::class, 'Register']);

Route::get('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/login', [AuthController::class, 'Log']);

Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('articles', ArticleController::class);});

