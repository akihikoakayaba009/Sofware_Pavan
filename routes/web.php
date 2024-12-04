<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController; // Importe o controller HomeController

Route::get('/', [HomeController::class, 'index'])->name('home');
use App\Http\Controllers\ProductController;


use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redireciona para a página principal após o logout
})->name('logout');
use App\Http\Controllers\CartController;

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});
//ROTA PARA ver detalhes dos produtos 
Route::get('/produto/{id}', 'App\Http\Controllers\ProductController@show')->name('show');
// Rotas para produtos
Route::get('/produtos', 'App\Http\Controllers\ProductController@index')->name('products.index');
Route::get('/produtos/criar', 'App\Http\Controllers\ProductController@create')->name('products.create');
Route::post('/produtos', 'App\Http\Controllers\ProductController@store')->name('products.store');
Route::get('/produtos/{produto}', 'App\Http\Controllers\ProductController@show')->name('products.form');
Route::get('/produtos/{produto}/editar', 'App\Http\Controllers\ProductController@edit')->name('products.edit');
Route::put('/produtos/{produto}', 'App\Http\Controllers\ProductController@update')->name('products.update');
Route::delete('/produtos/{produto}', 'App\Http\Controllers\ProductController@destroy')->name('products.destroy');
 //sobre nós
 use App\Http\Controllers\CaminhaoController;
 Route::resource('caminhao', CaminhaoController::class);


// Rotas para clientes
use App\Http\Controllers\ClienteController;

// Rota para ver detalhes de um cliente
Route::get('/cliente/{id}', [ClienteController::class, 'show'])->name('clientes.show');

// Rotas para clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index'); // Listar todos os clientes
Route::get('/clientes/criar', [ClienteController::class, 'create'])->name('clientes.create'); // Formulário para criar novo cliente
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store'); // Salvar novo cliente
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.form'); // Exibir detalhes de um cliente
Route::get('/clientes/{cliente}/editar', [ClienteController::class, 'edit'])->name('clientes.edit'); // Formulário para editar cliente
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update'); // Atualizar cliente
// Rota para excluir cliente
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
use App\Http\Controllers\PedidoController;

Route::resource('pedidos', PedidoController::class);
use App\Http\Controllers\DenominacaoChassiController;

Route::resource('denominacao_chassis', DenominacaoChassiController::class);
Route::delete('denominacao_chassis/{denominacao_chassi}', [DenominacaoChassiController::class, 'destroy'])->name('denominacao_chassis.destroy');
