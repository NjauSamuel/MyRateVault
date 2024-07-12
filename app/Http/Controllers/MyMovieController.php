<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyMovie;

class MyMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * index, create, store, edit, update, destroy
     */
    public function index()
    {
        //// Fetch all movies
        //$movies = MyMovie::all();
        //dd(MyMovie::all());
        // dd(MyMovie::latest()->get());
        /**
         * Here's a brief explanation of why MyMovie::latest()->all() is not valid:

            *latest(): This is a query builder method that modifies the query to include an ORDER BY clause.
            *all(): This is a static method that directly retrieves all records from the database table without considering any query builder methods.
        *Therefore, combining latest() with all() is not syntactically correct. Instead, use get() to execute the query built by latest().
         */
        return view('my-movies.index', ['movies' => MyMovie::latest()->get()]);
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
    public function store(Request $request)
    {
        //
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
