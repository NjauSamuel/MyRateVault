@extends('base')

@section('title', 'Favourites')

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

                <div class="inline min-w-[172px]">
                    <a href="{{ route('my-movies.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded whitespace-nowrap flex items-center justify-center w-full sm:w-36 h-10">
                        Share List
                        <svg width="20px" height="20px" class="icon ml-3" fill="#ffffff" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="7935ec95c421cee6d86eb22ecd12b5bb"> <path style="display: inline;" d="M505.705,421.851c0,49.528-40.146,89.649-89.637,89.649c-49.527,0-89.662-40.121-89.662-89.649 c0-1.622,0.148-3.206,0.236-4.815l-177.464-90.474c-14.883,11.028-33.272,17.641-53.221,17.641 c-49.528,0-89.662-40.134-89.662-89.649s40.134-89.649,89.662-89.649c22.169,0,42.429,8.097,58.086,21.433l172.774-88.09 c-0.25-2.682-0.412-5.364-0.412-8.097c0-49.503,40.135-89.649,89.662-89.649c49.49,0,89.637,40.146,89.637,89.649 c0,49.516-40.146,89.65-89.637,89.65c-22.082,0-42.242-8.009-57.861-21.221l-172.999,88.215c0.224,2.558,0.387,5.14,0.387,7.76 c0,4.653-0.474,9.182-1.148,13.648l171.389,87.379c15.92-14.472,37.004-23.379,60.232-23.379 C465.559,332.201,505.705,372.348,505.705,421.851z"> </path> </g> </g></svg>
                    </a>
                </div>
            </div>

        </div>


        <p class="description">These are my all-time favourite movies.</p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            @foreach ($movies as $movie)

            <div class="card">

                <div
                    class="front"
                    style=" background-image: url('{{ $movie->img_url }}'); ">
                    <p class="large">{{ $loop->iteration }}</p> <!-- Assigns ranking here since the controlle sorts results by ranking any way. -->
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
