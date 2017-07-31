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
  Route::get('getPagosFechas','AdminPanelController@getPagosFechas');
  Route::get('reportes','AdminPanelController@reportes');
   Route::get('getMovimientosClientes','AdminPanelController@getMovimientosClientes');
  Route::get('getSaldos','AdminPanelController@getSaldos');
  Route::get('getFacturasPendientes','ClienteController@getFacturasPendientes');
  Route::get('getSaldoDisponible','ClienteController@getSaldoDisponible');
  Route::resource('pagos','PagoController');
  Route::resource('usuarios','UserController');
  Route::resource('cajeros','CajeroController');
  Route::resource('tipopagos','TipoPagoController');
});

Auth::routes();
