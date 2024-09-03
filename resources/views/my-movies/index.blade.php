@extends('base')

@section('title', 'PHP - Laravel')

@section('content')

    <div>

        <div class="flex justify-between pr-6 mt-4">
            <div>
                <h1 class="heading">My Top 10 Movies</h1>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between sm:space-x-4 space-y-4 sm:space-y-0">

                <div class="inline">
                    <a href="{{ route('my-movies.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded whitespace-nowrap flex items-center justify-center w-full sm:w-36 h-10">
                        Add Movie
                        <svg width="30px" height="30px" viewBox="0 0 1024 1024" class="icon ml-3" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512 1024C229.7 1024 0 794.3 0 512S229.7 0 512 0s512 229.7 512 512-229.7 512-512 512z m0-938.7C276.7 85.3 85.3 276.7 85.3 512S276.7 938.7 512 938.7 938.7 747.3 938.7 512 747.3 85.3 512 85.3z" fill="#ffffff"></path><path d="M682.7 554.7H341.3c-23.6 0-42.7-19.1-42.7-42.7s19.1-42.7 42.7-42.7h341.3c23.6 0 42.7 19.1 42.7 42.7s-19.1 42.7-42.6 42.7z" fill="#ffffff"></path><path d="M512 725.3c-23.6 0-42.7-19.1-42.7-42.7V341.3c0-23.6 19.1-42.7 42.7-42.7s42.7 19.1 42.7 42.7v341.3c0 23.6-19.1 42.7-42.7 42.7z" fill="#ffffff"></path></g></svg>
                    </a>
                </div>

                <form action="{{ route('auth.destroy') }}" method="POST" class="inline w-full sm:w-36">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold rounded whitespace-nowrap flex items-center justify-center w-full h-10">
                        Logout
                    </button>
                </form>
            </div>

        </div>


        <p class="description">These are my all-time favourite movies.</p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            @foreach ($movies as $movie)

            <div class="card">

                <div
                    class="front"
                    style=" background-image: url('{{ $movie->img_url }}'); ">
                    <p class="large">{{ $movie->ranking }}</p>
                </div>

                <div class="back">
                    <div>

                        <div class="title">
                            {{ $movie->title }} <span class="release_date"> {{ $movie->year }} </span>
                        </div>

                        <div class="rating">
                            <label> {{ number_format($movie->rating, 1) }} </label>
                            <i class="fas fa-star star"></i>
                        </div>

                        <p class="review"> {{ $movie->review }} </p>

                        <p class="overview">
                            {{ $movie->description}}
                        </p>

                        <a href="{{ route('my-movies.edit', $movie) }}" class="button">Update</a>
                        <a class="button delete-button" onclick="document.getElementById('delete-dialog-{{ $movie->id }}').showModal();">Delete</a>

                        <!-- Delete Confirmation Dialog -->
                        <dialog id="delete-dialog-{{ $movie->id }}" class="p-6 bg-white rounded-md shadow-md">
                            <form method="dialog">
                                <p class="text-lg">Are you sure you want to delete this movie?</p>
                                <p class="font-bold my-1">{{ $movie->title }}</p>
                                <menu class="flex justify-center space-x-10">
                                    <button type="button" class="bg-green-500 text-white px-4 py-2 rounded" onclick="document.getElementById('delete-form-{{ $movie->id }}').submit();">Yes</button>
                                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="document.getElementById('delete-dialog-{{ $movie->id }}').close();">No</button>
                                </menu>
                            </form>
                        </dialog>

                        <!-- Hidden Form to submit delete request -->
                        <form id="delete-form-{{ $movie->id }}" action="{{ route('my-movies.destroy', $movie) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                </div>
            </div>

            @endforeach
        </div>


    </div>

    <div class="mx-auto max-w-max container add">
        <a href="{{ route('my-movies.create') }}" class="button" >
            Add Movie
        </a>
    </div>

@endsection
