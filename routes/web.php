<?php

use App\Http\Controllers\UserController;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;


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

Route::get('/cadastrar', [UserController::class, 'create'])->name('get.register');
Route::post('/cadastrar', [UserController::class, 'store'])->name('post.register');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware('auth')->group(function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    Route::delete('/finance/{financeId}', [MenuController::class, 'destroy'])->name('finance.destroy');
});

Route::post('/finance', [MenuController::class, 'store'])->name('store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
