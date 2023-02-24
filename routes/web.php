<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\PlayerController;

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
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('validate', [LoginController::class, 'getValidation'])->name('validate');
Route::post('validateToken', [LoginController::class, 'validateToken'])->name('validateToken');

Route::get('getPanel/{token}', [AdminController::class, 'getPanel'])->name('getPanel');
Route::post('importFile', [AdminController::class, 'importFile'])->name('importFile');
Route::get('Registration', [AdminController::class, 'getRegistration'])->name('Registration');

Route::get('index/{id}/{token}', [PlayerController::class, 'index'])->name('index');
Route::post('RedirectToPersonal', [PlayerController::class, 'RedirectToPersonal'])->name('RedirectToPersonal');

Route::view('personal', 'user.personal')->name('personal');
Route::view('standings', 'user.standings')->name('standings');
Route::view('pairings', 'user.pairings')->name('pairings');

Route::resource('tournaments', TournamentController::class);