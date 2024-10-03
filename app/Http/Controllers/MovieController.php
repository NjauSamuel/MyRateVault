<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class MovieController extends Controller
{    
    public function getTrailer($title, $year)
    {
        $query = $title . ' Trailer ' . $year;
        $apiKey = env('YOUTUBE_API_KEY');
        
        $response = Http::withOptions(['verify' => false])->get("https://www.googleapis.com/youtube/v3/search", [
            'part' => 'snippet',
            'q' => $query,
            'type' => 'video',
            'key' => $apiKey,
            'maxResults' => 1,
        ]);

        $items = $response->json('items');
        if (!empty($items)) {
            $videoId = $items[0]['id']['videoId'];
            return "https://www.youtube.com/embed/" . $videoId;
        }

        return null; // Return null if no video found
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Cache the entire content of the index method for 24 hours (1440 minutes)
        $movies = Cache::remember('movies_with_trailers', 1440, function () {
            // Fetch movies from the API
            $response = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/trending/all/day?language=en-US', [
                'headers' => [
                    'accept' => 'application/json',
                ],
                'api_key' => env('MOVIE_DB_API_KEY') // Fetched from the .env file
            ]);

            $movies = $response->json('results');

            // For each movie/TV show, fetch the trailer
            foreach ($movies as &$movie) {

                // Skip if the media type is 'person'
                if ($movie['media_type'] === 'person') {
                    continue;
                }

                $title = $movie['title'] ?? $movie['name']; // Use title for movies and name for TV shows
                $year = substr($movie['release_date'] ?? $movie['first_air_date'], 0, 4); // Extract the year
                $movie['trailer_url'] = $this->getTrailer($title, $year);            
            }


            return $movies;
        });

        // Return the view with movies and their trailers
        return view('home.index', ['movies' => $movies]);
    }

    // A list of the liked movies by users. 
    public function liked()
    {
        return view('home.liked');
    }
}
