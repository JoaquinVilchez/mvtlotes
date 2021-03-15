<?php

use App\Events\PlacaGeneral;
use App\Events\ProximoSorteo;
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
    return redirect()->route('screen.index');
});

Auth::routes(['verify' => false]);

Route::get('/sorteo', 'App\Http\Controllers\LotteryController@create')->name('lottery.create')->middleware('auth');
Route::post('/sorteo/registrar', 'App\Http\Controllers\LotteryController@store')->name('lottery.store')->middleware('auth');

Route::get('/resultados', 'App\Http\Controllers\LotteryController@show')->name('lottery.show')->middleware('auth');
Route::post('/resultado/eliminar', 'App\Http\Controllers\LotteryController@destroy')->name('lottery.destroy')->middleware('auth');

Route::get('/lotes', 'App\Http\Controllers\LotController@index')->name('lot.index')->middleware('auth');
Route::get('/lote/editar/{id}', 'App\Http\Controllers\LotController@edit')->name('lot.edit')->middleware('auth');
Route::put('/lote/editar/{id}', 'App\Http\Controllers\LotController@update')->name('lot.update')->middleware('auth');

Route::post('/getLots', 'App\Http\Controllers\LotteryController@getLots')->name('ajax.getLots')->middleware('auth');
Route::post('/getPersons', 'App\Http\Controllers\LotteryController@getPersons')->name('ajax.getPersons')->middleware('auth');


Route::get('/home', function () {
    return redirect()->route('screen.index');
})->name('home')->middleware('auth');

Route::get('/pantalla', function () {
    return view('controlpanel.screen')->with('pagename', 'Pantalla');
})->name('screen.index')->middleware('auth');

Route::get('/miperfil', 'App\Http\Controllers\UserController@index')->name('user.index')->middleware('auth');
Route::put('/usuario/{id}', 'App\Http\Controllers\UserController@update')->name('user.update')->middleware('auth');

Route::get('/personas', 'App\Http\Controllers\PersonController@index')->name('person.index')->middleware('auth');

Route::get('/salida', function () {
    return view('output.index')->with('pagename', 'Sorteo General');
})->name('output.index')->middleware('auth');

Route::get('/opcion1', 'App\Http\Controllers\EventController@placaGeneral')->name('output.placageneral');

Route::get('/opcion2', 'App\Http\Controllers\EventController@proximoSorteo')->name('output.proximosorteo');
