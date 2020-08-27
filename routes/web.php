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

Route::get('/producto/categorianew', 'CategoriaController@create')->name('newcategoria');

Route::get('/proveedores/new', 'ProveedorController@create')->name('newprov');

Route::get('/cliente/new', 'ClienteController@create')->name('newcliente');


