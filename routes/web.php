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

//rotte protette da autenticazione
Route::prefix('admin') // prefisso rotte
    ->namespace('Admin') // namespace (sottocartelle Controller)
    ->middleware('auth') // filtro per autenticazione
    ->name('admin.') // prefisso di tutti i nomi delle rotte
    ->group(function() {

        Route::resource('comics', 'ComicController');

    }
);

Route::get('/home', 'HomeController@index')->name('home');
// rotte pubbliche
Route::get("/", "ComicController@index")->name('comics.index');
Route::get("/comics/{id}", "ComicController@show")->name('comics.show');

Route::get("/characters", "CharacterController@index")->name('characters.index');
Route::get("/characters/{slug}", "CharacterController@show")->name('characters.show');
