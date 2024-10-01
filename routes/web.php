<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyMovieController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


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

// Google Callback URL's:
// Redirect to Google

Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google.redirect');
 
Route::get('/auth/google/callback', function (){
    // Get user from Google
    $googleUser = Socialite::driver('google')->stateless()->user();
    
    // Use updateOrCreate to save or update the user
    $user = User::updateOrCreate(
        // ['google_id' => $googleUser->getId()], // Match by Google ID
        ['email' => $googleUser->getEmail()], // Match by Google ID
        [
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'google_avatar' => $googleUser->getAvatar(), // URL of the Google profile imagenerate a random password for users who log in with Google
            'google_id' => $googleUser->getId(), // The User's Google ID
        ]
    );

    // Log the user in
    Auth::login($user);

    return redirect(route('my-movies.index'));
})->name('auth.google.callback');

// Registering a New User
Route::resource('register', RegisterController::class)->only(['create', 'store']);

