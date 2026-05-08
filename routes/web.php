<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Auth;

Route::get('/games', [GamesController::class, 'index'])->name('games');

Route::get('/three_in_row', function () {return view('three_in_row');})->name('three_in_row')->middleware('auth');
Route::get('/statistics', function () {return view('statistics');})->name('statistics')->middleware('auth');
// Route::get('/three_in_row', function () {return view('three_in_row');}) ->middleware('auth');
// Route::get('/level_three_in_row', function () {return view('level_three_in_row');})->name('level');


Route::post('/progress', [GamesController::class, 'updateUserProgress'])->name('progress');
// Route::get('/levels', [GamesController::class, 'showLevels'])->name('levels.show');
Route::get('/level_three_in_row', [GamesController::class, 'showLevels'])->name('level');

Route::get('/statistics', [GamesController::class, 'showStatistics'])->name('statistics');

// Страница регистрации
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Обработка регистрации
Route::post('/register', [RegisterController::class, 'register']);

// Маршрут для отображения формы входа (страницы авторизации)
Route::get('/login', [LoginController::class, 'login'])->name('login');  
// Маршрут для выхода из системы
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Маршрут для обработки данных формы аутентификации
Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/', function () {
    return view('home');
});
