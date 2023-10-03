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

Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'edit',
], function() {
    Route::get('films/publish/{film}', 'FilmController@publish')->name('films.publish');
    Route::resource('genres', GenreController::class);
    Route::resource('films', FilmController::class);
});

Route::group([
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'onlyJson',
    'as' => 'show.'
], function() {
    Route::resource('genres', ShowGenresController::class)->only('index', 'show');
    Route::resource('films', ShowFilmsController::class)->only('index', 'show');
});

Route::get('/', function () {
    return view('welcome');
});
