<?php


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

Auth::routes(['verify'=>true]);

Route::redirect('/', '/home');

Route::group(['prefix'=> 'home','middleware' => 'verified'],function(){
    Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('?acao=saque',[App\Http\Controllers\HomeController::class, 'index'])->name('home.saque');
    Route::get('?acao=deposito', [App\Http\Controllers\HomeController::class, 'index'])->name('home.deposito');
    Route::post('/sacar', [App\Http\Controllers\HomeController::class, 'withdraw'])->name('saque');
    Route::post('/depositar', [App\Http\Controllers\HomeController::class, 'deposit'])->name('deposito');
});

Route::group(['prefix'=>'despesa'],function(){
    Route::get('/',[App\Http\Controllers\HomeController::class, 'expenseControl'])->name('despesa');
    Route::post('/',[App\Http\Controllers\HomeController::class, 'addExpense'])->name('despesa.add');
    Route::get('/remove/{id}',[App\Http\Controllers\HomeController::class, 'removeExpense'])->name('despesa.remove');
});

Route::get('/logs',[App\Http\Controllers\HomeController::class, 'logs'])
    ->name('logs');
