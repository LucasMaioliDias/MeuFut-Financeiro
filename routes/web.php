<?php

use App\Http\Controllers\UserController;
use App\Http\Requests\StoreUserRequest;
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

Route::get('/cadastrar', [UserController::class, 'create'])->name('get.register');
Route::post('/cadastrar', [UserController::class, 'store'])->name('post.register');

Route::get('/login',function(){})->name('login');
