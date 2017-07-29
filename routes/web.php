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
Route::resource('saldos','SaldoController');
Route::group(['middleware' => 'auth'], function () {
  Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
  Route::get('/','AdminPanelController@index');
  Route::get('numberConnections','AdminPanelController@getNumberOfConnections');
  Route::get('perfil','AdminPanelController@profile');
  Route::get('reporte','AdminPanelController@getPDF');
  Route::resource('usuarios','UserController');



  Route::resource('cajeros','CajeroController');
  Route::group(['prefix' => 'cajeros'], function () {
      Route::get('/cambiarEstado/{id}', 'CajeroController@cambiarEstado');
  });
  Route::resource('tipopagos','TipoPagoController');
  Route::group(['prefix' => 'tipopagos'], function () {
      Route::get('/cambiarEstado/{id}', 'TipoPagoController@cambiarEstado');
  });
  Route::resource('pagos','PagoController');
  Route::group(['prefix' => 'pagos'], function () {
      Route::get('/enviarPago','PagoController@enviarPago');
  });
});

Auth::routes();
