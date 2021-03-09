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

Route::get('/home', function () {
    return redirect()->route('screen.index');
})->name('home');

Route::get('/pantalla', function () {
    return view('controlpanel.screen')->with('pagename', 'Pantalla');
})->name('screen.index');

Route::get('/miperfil', function () {
    return view('controlpanel.myprofile')->with('pagename', 'Mi perfil');
})->name('myprofile.index');

Route::get('/personas', function () {
    return view('controlpanel.persons')->with('pagename', 'Personas');
})->name('person.index');

Route::get('/sorteo', function () {
    return view('controlpanel.lottery')->with('pagename', 'Sorteos');
})->name('lottery.index');

Route::get('/resultados', function () {
    return view('controlpanel.results')->with('pagename', 'Resultados');
})->name('result.index');

Route::get('/salida', function () {
    return view('output.index')->with('pagename', 'Sorteo General');
})->name('output.index');
