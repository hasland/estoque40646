<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*
|--------------------------------------------------------------------------
| JWT Routes
|--------------------------------------------------------------------------
*/
Route::post('/jwt/login', '\Paulvl\JWTGuard\Http\Controllers\Auth\LoginController@login')->name('jwt.login');
Route::post('/jwt/refresh', '\Paulvl\JWTGuard\Http\Controllers\Auth\LoginController@refresh')->name('jwt.refresh');
Route::post('/jwt/blacklist', '\Paulvl\JWTGuard\Http\Controllers\Auth\LoginController@blacklist')->name('jwt.blacklist');


Route::middleware('valid-jwt:api_token')->group (function(){
    Route::get('/inicio', function () {
        return 'ok';
    });
});

Route::middleware('valid-jwt:api_token')->get('/gabriel', function (Request $request) {
    // any thing tha you need to protect
});

//Rotas garagem inicio
Route::group(['prefix'=>'garagem'], function(){
    Route::get('','GaragemController@todasGaragens');
    Route::get('{id}','GaragemController@getGaragem');
    Route::post('','GaragemController@salvarGaragem');
    Route::put('{id}','GaragemController@atualizarGaragem');
    Route::delete('{id}','GaragemController@deletarGaragem');
});
//Rotas garagem fim

//Rotas marca inicio
Route::group(['prefix'=>'marca'], function(){
    Route::get('','MarcaController@todasMarcas');
    Route::get('{id}','MarcaController@getMarca');
    Route::post('','MarcaController@salvarMarca');
    Route::put('{id}','MarcaController@atualizarMarca');
    Route::delete('{id}','MarcaController@deletarMarca');
});
//Rotas marca fim

//Rotas carro inicio
Route::group(['prefix'=>'carro'], function(){
    Route::get('','CarroController@todosCarros');
    Route::get('{id}','CarroController@getCarro');
    Route::post('','CarroController@salvarCarro');
    Route::put('{id}','CarroController@atualizarCarro');
    Route::delete('{id}','CarroController@deletarCarro');
});
//Rotas carro fim