<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\Auth\LogoutController;
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

Route::get('/', function() {
    return '<h1>HELLO WORLD!</h1>';
});

//Listagem de Produtos
Route::get('/produtos', [ProdutoController::class, 'lista'])->name('listagem');
Route::get('/produtos/mostra/{id}', [ProdutoController::class, 'mostra'])->where('id', '[0-9]+');

//Adicionar novos produtos
Route::get('/produtos/novo', [ProdutoController::class, 'novo'])->name('novo');
Route::post('/produtos/adicionar', [ProdutoController::class, 'adiciona'])->name('adiciona');

//Editar produtos
Route::get('/produtos/edit/{id}', [ProdutoController::class, 'edit'])->name('edit');
Route::post('/produtos/save', [ProdutoController::class, 'save'])->name('save');

//Remover produtos
Route::get('/produtos/remove/{id}', [ProdutoController::class, 'remove']);

//Lista Json dos produtos do Database
Route::get('/produtos/json', [ProdutoController::class, 'listaJson']);

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
Auth::routes();

