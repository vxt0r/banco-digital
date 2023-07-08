<?php

use App\Mail\MensagemEmail;
use Illuminate\Support\Facades\Auth;
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

Route::redirect('/', '/home');

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');
Route::get('/home?acao=saque', [App\Http\Controllers\HomeController::class, 'index'])->name('home.saque');
Route::get('/home?acao=deposito', [App\Http\Controllers\HomeController::class, 'index'])->name('home.deposito');

Route::post('/home/sacar', [App\Http\Controllers\HomeController::class, 'sacar'])->name('saque');
Route::post('/home/depositar', [App\Http\Controllers\HomeController::class, 'depositar'])->name('deposito');
