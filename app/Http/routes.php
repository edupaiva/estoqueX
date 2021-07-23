<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('home', 'HomeController@index'); 
Route::controllers([ 'auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController', ]);

Route::get('/', function () {
    return view('welcome');
});

//==================================

Route::get('/produtos', "ProdutoController@lista");
Route::get('/produtos/novo', "ProdutoController@formularioCadastro");
Route::post('/produtos/adiciona', "ProdutoController@adiciona");
Route::get('/produtos/mostra/{id}', "ProdutoController@mostra")->where('id', '[0-9]+');
Route::get('/produtos/remove/{id}', "ProdutoController@remove");
Route::get('/produtos/atualizar/{id}', "ProdutoController@atualizar");
Route::get('/login', "LoginController@login");

/*Route::namespace('api')->prefix('produtos')->group( function(){

Route::group(['namespace' => 'api', 'prefix' => 'produtos'], function() {
    Route::get('/', 'ProdutosController@index');
    Route::get('/{id}', 'ProdutosController@me');
    Route::post('/', 'ProdutosController@save');
});*/

//funcionado normal
Route::get('api/produtos', 'api\ProdutosController@index');
Route::post('api/produtos', 'api\ProdutosController@save');
Route::get('api/produtos/{id}', 'api\ProdutosController@me');
Route::put('api/produtos', 'api\ProdutosController@update');
Route::patch('api/produtos', 'api\ProdutosController@update');
Route::delete('api/produtos/{id}', 'api\ProdutosController@delete');