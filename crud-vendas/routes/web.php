<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LojaController;

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

//Clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/clientes/{cliente}', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

//Lojas
Route::get('/lojas', [LojaController::class, 'index'])->name('loja.index');
Route::get('/lojas/create', [LojaController::class, 'create'])->name('loja.create');
Route::post('/lojas', [LojaController::class, 'store'])->name('loja.store');
Route::get('/lojas/{loja}', [LojaController::class, 'edit'])->name('loja.edit');
Route::put('/lojas/{loja}', [LojaController::class, 'update'])->name('loja.update');
Route::delete('/lojas/{loja}', [LojaController::class, 'destroy'])->name('loja.destroy');
Route::post('/consulta-cep', [LojaController::class, 'consultaCep']);

