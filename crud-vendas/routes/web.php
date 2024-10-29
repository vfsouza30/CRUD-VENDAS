<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\RelatorioController;

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
    return view('layouts.default');
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

//Vendedores
Route::get('/vendedores', [VendedorController::class, 'index'])->name('vendedor.index');
Route::get('/vendedores/create', [VendedorController::class, 'create'])->name('vendedor.create');
Route::post('/vendedores', [VendedorController::class, 'store'])->name('vendedor.store');
Route::get('/vendedores/{vendedor}', [VendedorController::class, 'edit'])->name('vendedor.edit');
Route::put('/vendedores/{vendedor}', [VendedorController::class, 'update'])->name('vendedor.update');
Route::delete('/vendedores/{vendedor}', [VendedorController::class, 'destroy'])->name('vendedor.destroy');

//Produtos
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produto.index');
Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produto.create');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produto.store');
Route::get('/produtos/{produto}', [ProdutoController::class, 'edit'])->name('produto.edit');
Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produto.update');
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produto.destroy');

//Vendas
Route::get('/vendas', [VendaController::class, 'index'])->name('venda.index');
Route::get('/vendas/create', [VendaController::class, 'create'])->name('venda.create');
Route::post('/vendas', [VendaController::class, 'store'])->name('venda.store');
Route::get('/vendas/{venda}', [VendaController::class, 'edit'])->name('venda.edit');
Route::put('/vendas/{venda}', [VendaController::class, 'update'])->name('venda.update');
Route::delete('/vendas/{venda}', [VendaController::class, 'destroy'])->name('venda.destroy');

//Relatorios
Route::get('/relatorios/vendas', [RelatorioController::class, 'salesReport'])->name('relatorio.vendas');