<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    return redirect('login');;
});



// Auth::routes(['register' => true]); 
Route :: get ('login' , 'Auth\LoginController@showLoginForm')->name('login');
Route :: post ('login' , 'Auth\LoginController@login');
Route :: post ('logout' , 'Auth\LoginController@logout')->name('logout');
Route :: get ('home' , 'HomeController@index');


Route :: get ('complemento/' , 'ComplementoController@index');
Route :: post ('complemento/cadastrar' , 'ComplementoController@store');
Route :: get ('produtos/showAll' , 'ProdutoController@showAll');
Route :: get ('produtos/' , 'ProdutoController@index');
Route :: post ('produtos/deletar' , 'ProdutoController@deletar');
Route :: post ('produtos/store' , 'ProdutoController@store');
Route :: get ('pedidos/clientes' , 'Pedido_produto_usuario@getAllPedidos');


Route::resource('produtos', ProdutoController::class);

Route::resource('pedidos', PedidosController::class);

Route::get('dashaboard/index', 'ControllerDashaBoard@index');

Route::resource('dashaboard', ControllerDashaBoard::class);


