<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\ComputersController;
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


Route::get('/', [ComputersController::class, 'index'])->name('home.index');
Route::get('/about', [StaticController::class, 'about'])->name('home.about');
Route::get('/contact', [StaticController::class, 'cont'])->name('home.cont');

Route::resource('computers', ComputersController::class);


