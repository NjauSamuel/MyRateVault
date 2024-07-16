<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyMovieController;


// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', fn() => to_route('my-movies.index'));


Route::resource('my-movies', MyMovieController::class)
    ->only(["index","create", "store", "edit","update", "destroy"]);


Route::get('my-movies/find_movie', [MyMovieController::class, 'find_movie'])
    ->name('my-movies.find_movie');

