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
    return redirect()->route('screen.index');
});

Auth::routes(['verify' => false]);

Route::get('/sorteo', 'App\Http\Controllers\LotteryController@create')->name('lottery.create');
Route::post('/sorteo/registrar', 'App\Http\Controllers\LotteryController@store')->name('lottery.store');

Route::get('/resultados', 'App\Http\Controllers\LotteryController@show')->name('lottery.show');
Route::post('/resultado/eliminar', 'App\Http\Controllers\LotteryController@destroy')->name('lottery.destroy');

Route::get('/lotes', 'App\Http\Controllers\LotController@index')->name('lot.index');
Route::get('/lote/editar/{id}', 'App\Http\Controllers\LotController@edit')->name('lot.edit');
Route::put('/lote/editar/{id}', 'App\Http\Controllers\LotController@update')->name('lot.update');

Route::get('/home', function () {
    return redirect()->route('screen.index');
})->name('home');

Route::get('/pantalla', function () {
    return view('controlpanel.screen')->with('pagename', 'Pantalla');
})->name('screen.index');

Route::get('/miperfil', 'App\Http\Controllers\UserController@index')->name('user.index');
Route::put('/usuario/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');

Route::get('/personas', 'App\Http\Controllers\PersonController@index')->name('person.index');

Route::get('/salida', function () {
    return view('output.index')->with('pagename', 'Sorteo General');
})->name('output.index');
