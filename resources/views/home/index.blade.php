@extends('base')

@section('title', 'All Movies')

@section('content')

    <div class="container mx-auto p-4">

        <h1 class="text-3xl font-bold mb-6">Trending Movies</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            {{-- Loop for movies --}}
            @foreach ($movies as $movie)
                @if ($movie['media_type'] === 'movie')
                    <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $movie['title'] }}</h2>
                            <p class="text-gray-400 mb-2">{{ $movie['overview'] }}</p>
                            {{-- Time badge for movies (release date) --}}
                            <span class="text-sm bg-gray-800 text-white py-1 px-2 rounded">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <h1 class="text-3xl font-bold mb-6 mt-10">Trending TV Shows</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            {{-- Loop for TV shows --}}
            @foreach ($movies as $movie)
                @if ($movie['media_type'] === 'tv')
                    <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['name'] }}" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $movie['name'] }}</h2>
                            <p class="text-gray-400 mb-2">{{ $movie['overview'] }}</p>
                            {{-- Time badge for TV shows (first air date) --}}
                            <span class="text-sm bg-gray-800 text-white py-1 px-2 rounded">{{ \Carbon\Carbon::parse($movie['first_air_date'])->format('M d, Y') }}</span>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </div>

@endsection