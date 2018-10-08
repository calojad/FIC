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

//******RUTAS SIN AUTENTICACION


//*****RUTAS CON AUTENTICACION
Auth::routes();
//*****GRUPO DE RUTAS
Route::group(['middleware' => 'auth'], function () {
//*****HOME
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', function () {return view('home');});
//*****VENTAS - FACTURACION
    Route::get('/venta', function (){return view('facturacion.factura');})->name('home');
    Route::get('venta/search/cliente', 'ClienteController@autocomplete');
    Route::get('venta/search/producto/codigo', 'ProductoController@autocompletecodigo');
    Route::get('venta/search/producto/nombre', 'ProductoController@autocompletenombre');
    Route::post('/venta', 'FacturaController@generarfactura');
//*****MANTENIMIENTOS
    Route::resource('clientes', 'ClienteController');
    Route::resource('productos', 'ProductoController');
    Route::resource('usuarios', 'UsuarioController');
});