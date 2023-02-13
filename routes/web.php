<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'getLogin'])->name('login');
Route::post('log-in', [LoginController::class, 'login'])->name('log-in'); 

Route::get('validate', [LoginController::class, 'getValidation'])->name('validate');
Route::post('validateToken', [LoginController::class, 'validateToken'])->name('validateToken');