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

//ruta principal (/) index                  MIDDLEWARE AUTH: la ruta verifica si el usuasio esta logeado lo deje pasar, de lo contrario que lo lleve a login
Route::get('/', 'App\Http\Controllers\DocDocumentoController@index')->middleware(['auth'])->name('documentos.index');
Route::get('/documentos/create','App\Http\Controllers\DocDocumentoController@create')->name('documentos.create');//MOSTRAR LA VISTA
            // (/) lo primero que se va a ver primero cuando se entre a la url
            //donde lo voy a direccionar(como deseo que se llame)  //store GUARDAR
Route::post('/documentos','App\Http\Controllers\DocDocumentoController@store')->middleware(['auth'])->name('documentos.store'); //GUARDAR LA INFO
Route::get('/documentos/{id}','App\Http\Controllers\DocDocumentoController@edit')->middleware(['auth'])->name('documentos.edit');//MOSTRAR LA VISTA CON GET DE EDIT
Route::put('/documentos/{id}','App\Http\Controllers\DocDocumentoController@update')->middleware(['auth'])->name('documentos.update');
Route::delete('/documentos/{id}','App\Http\Controllers\DocDocumentoController@destroy')->middleware(['auth'])->name('documentos.destroy');


Route::get('/dashboard', 'App\Http\Controllers\DocDocumentoController@index')->middleware(['auth'])->name('dashboard');



/* Route::group(attributes:['middleware' =>'auth'], routes: function(){


});
 */
require __DIR__.'/auth.php';
