<?php

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

Route::group(['middleware' => 'auth'], function () {
  Route::get('/','AdminPanelController@index');
  Route::get('perfil','AdminPanelController@profile');
  Route::get('reporte','AdminPanelController@getPDF');
  Route::resource('usuarios','UserController');
  Route::resource('cajeros','CajeroController');
  Route::get('cajeros/cambiarEstado/{id}', 'CajeroController@cambiarEstado');
  Route::resource('tipopagos','TipoPagoController');
  Route::resource('pagos','PagoController');
});

Auth::routes();
