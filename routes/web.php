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

    AdvancedRoute::controller('/venta','FacturaController');
    AdvancedRoute::controller('/cliente','ClienteController');
    AdvancedRoute::controller('/producto','ProductoController');

//*****MANTENIMIENTOS
    Route::resource('clientes', 'ClienteController');
    Route::resource('productos', 'ProductoController');
    Route::resource('usuarios', 'UsuarioController');
    Route::resource('facturas', 'FacturaController');
});