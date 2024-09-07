<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch movies from the API
        $response = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/trending/all/day?language=en-US', [
            'headers' => [
                'accept' => 'application/json',
            ],
            'api_key' => env('MOVIE_DB_API_KEY') // Fetched from the .env file
        ]);

        $movies = $response->json('results');

        // dd($movies);

        // Return the view with movies data
        return view('home.index', ['movies' => $movies]);
    }

    
}
