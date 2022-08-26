<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
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

Route::match(['get', 'post'], '/', [ ProdutoController::class, 'index'])
    ->name('home');


Route::match(['get', 'post'], '/categoria', [ ProdutoController::class, 'categoria'])
    ->name('categoria');

    Route::match(['get', 'post'], '/{idcategoria}/categoria', [ ProdutoController::class, 'categoria'])
    ->name('categoria_por_id');

Route::match(['get', 'post'], '/cadastrar', [ UsuarioController::class, 'cadastrar'])
    ->name('cadastrar');


 Route::match(['get', 'post'], '/logar', [ UsuarioController::class, 'logar'])
    ->name('logar');

Route::match(['get', 'post'], '/{idproduto}/carrinho/adicionar', [ ProdutoController::class, 'adicionarCarrinho'])
    ->name('adicionar_carrinho');

Route::match(['get', 'post'], '/carrinho', [ ProdutoController::class, 'verCarrinho'])
    ->name('ver_carrinho');

Route::match(['get', 'post'], '/{indice}/excluircarrinho', [ ProdutoController::class, 'excluirCarrinho'])
    ->name('carrinho_excluir');

Route::match(['get', 'post'], '/enviarProduto', [ ProdutoController::class, 'enviarProdutos'])
    ->name('enviarProduto');

    Route::match(['get'], '/enviarProdutoMenu', [ ProdutoController::class, 'enviarProdutoMenu'])
    ->name('enviarProdutoMenu');

Route::match(['get'], '/verProdutosEnviados', [ ProdutoController::class, 'verProdutosEnviados'])
    ->name('verProdutosEnviados');

    Route::match(['get'], '/deletarProdutosEnviados/{id}', [ ProdutoController::class, 'deletarProduto'])
    ->name('deletarProdutosEnviados');
   
    Route::match(['get', 'post', 'put'], '/atualizarProdutos/{id}', [ ProdutoController::class, 'atualizarProdutos'])
    ->name('atualizarProdutos');
   



Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

Route::get('logout', [GoogleAuthController::class, 'logout'])->name('logout');

//require __DIR__.'/auth.php';