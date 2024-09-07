<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyMovie;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class MyMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * index, create, store, edit, update, destroy
     */
    public function index()
    {
        
         // Fetch movies ordered by rating in descending order
        $movies = MyMovie::orderBy('rating', 'desc')->get();

        // Assign rankings and save to database
        foreach ($movies as $index => $movie) {
            $movie->ranking = $index + 1; // Rank 1 for the highest rated movie
            $movie->save(); // Save the ranking to the database
        }

        // dd($movies);
        return view('my-movies.index', ['movies' => MyMovie::orderBy('rating', 'desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my-movies.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, MyMovie $myMovie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $movieTitle = $request->input('title');
        $response = Http::withOptions(['verify' => false])->get(env('MOVIE_DB_SEARCH_URL'), [
            'api_key' => env('MOVIE_DB_API_KEY'),
            'query' => $movieTitle
        ]);

        $data = $response->json()['results'];

        return view('my-movies.select', ['options' => $data]);
    }

    public function find_movie(Request $request, User $user)
    {
        $movieApiId = $request->query('id');

        if ($movieApiId) {
            $movieApiUrl = env("MOVIE_DB_INFO_URL")."/$movieApiId";
            $response = Http::withOptions(['verify' => false])->get($movieApiUrl, [
                'api_key' => env('MOVIE_DB_API_KEY'), // Use your API key from the .env file
                'language' => 'en-US',
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                $newMovie = new MyMovie([
                    'user_id' => auth()->id(),
                    'title' => $data['title'],
                    'year' => explode('-', $data['release_date'])[0], // Get the year from release_date
                    'img_url' => env("MOVIE_DB_IMAGE_URL")."{$data['poster_path']}",
                    'description' => $data['overview'],
                ]);

                $newMovie->save();

                // Redirect to the edit route
                return redirect()->route('my-movies.edit', $newMovie);
            }

            return response()->json(['message' => 'Movie not found'], 404);
        }

        return response()->json(['message' => 'Invalid movie ID'], 400);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyMovie $myMovie)
    {
        //dd($myMovie);
        return view('my-movies.edit', ['movie' => $myMovie]);        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MyMovie $myMovie)
    {
        // Validate and update the specified movie
        $request->validate([
            'rating' => 'required|numeric|min:0|max:10',
            'review' => 'required|string|max:1000',
        ]);

        $myMovie->update($request->all());

        return redirect()->route('my-movies.index')
                         ->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MyMovie $myMovie)
    {
        $myMovie->delete();

        return redirect()->route('my-movies.index')->with('success', 'Movie deleted successfully.');
    }
}
