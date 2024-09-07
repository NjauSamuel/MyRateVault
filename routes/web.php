<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyMovieController;


// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', fn() => to_route('movies.index'));

Route::get('login', fn() => to_route('auth.create'))->name('login');

Route::delete('logout', fn()=> to_route('auth.destroy'))->name('logout');

Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);

Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');


Route::middleware('auth')->group(function () {    

    Route::resource('my-movies', MyMovieController::class)
        ->only(["index","create", "store", "edit","update", "destroy"]);


    Route::get('my-movies/find_movie', [MyMovieController::class, 'find_movie'])
        ->name('my-movies.find_movie');

});

Route::resource('movies', MovieController::class)
    ->only(['index']);
