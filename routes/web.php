<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('/home', [LoginController::class, 'home'])->name('home');

Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'v1'
// ], function ($router) {
//     Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
// });
