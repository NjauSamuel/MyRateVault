@extends('base')

@section('title', 'Python - Laravel')

@section('content')

    <div>

        <h1 class="heading">My Top 10 Movies</h1>

        <p class="description">These are my all-time favourite movies.</p>

        @foreach ($movies as $movie)

            <div class="card">

                <div
                    class="front"
                    style=" background-image: url('{{ $movie->img_url }}'); ">
                    <p class="large">1</p>
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

    <div class="mx-auto max-w-max container add">
        <a href="{{ route('my-movies.create') }}" class="button" >
            Add Movie
        </a>
    </div>

@endsection
