<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/panel', 'HomeController@panel')->name('panel');

Route::get('/producto/new', 'ProductoController@create')->name('newprod');

Route::get('/producto/lista', 'ProductoController@index')->name('listaprod');

Route::get('/producto/categorianew', 'CategoriasController@create')->name('newcategoria');

Route::post('/producto/categoria/add','CategoriasController@store')->name('addcategoria');

Route::post('/producto/categoria/delete','CategoriasController@destroy')->name('deletecategoria');

Route::get('/proveedores/new', 'ProveedorController@create')->name('newprov');

Route::get('/proveedores/lista', 'ProveedorController@index')->name('listaprov');

Route::get('/proveedores/detalles/{id}', 'ProveedorController@show')->name('detallep');

Route::get('/proveedores/editar/{id}', 'ProveedorController@edit')->name('editprov');

Route::get('/clientes/new', 'ClienteController@create')->name('newcliente');

Route::get('/clientes/lista', 'ClienteController@index')->name('listaclientes');

Route::get('/clientes/detalles/{id}', 'ClienteController@show')->name('detallec');

Route::post('/clientes/new/add','ClienteController@store')->name('addcliente');

Route::get('/inventario/new', 'InventarioController@show')->name('newstock');

Route::get('/inventario/listaverduleria', 'InventarioController@showverduleria')->name('listav');

Route::get('/inventario/listacongelados', 'InventarioController@showcongelados')->name('listac');


Route::post('/producto/categoria/add','CategoriasController@store')->name('addcategoria');

Route::post('/producto/categoria/delete','CategoriasController@destroy')->name('deletecategoria');

Route::post('/producto/new/add','ProductoController@store')->name('addproducto');

