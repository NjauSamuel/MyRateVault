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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
