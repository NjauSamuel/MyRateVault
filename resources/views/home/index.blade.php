@extends('base')

@section('title', 'All Movies')

@section('content')

    <div class="container mx-auto p-4">

        <h1 class="text-3xl font-bold mb-6">Trending Movies</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            {{-- Loop for movies --}}
            @foreach ($movies as $movie)
                @if ($movie['media_type'] === 'movie')
                    <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg cursor-pointer"
                        onclick="openModal('{{ $movie['id'] }}')">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}"
                            class="w-full h-64 object-cover">
                    </div>

                    <!-- The hidden modal that will only appear when the image above is clicked-->
                    <div id="movieModal-{{ $movie['id'] }}" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 hidden">
                        <div class="bg-white w-full max-w-3xl p-6 rounded-lg relative h-screen overflow-y-auto">
                            <!-- Title Row -->
                            <div class="flex justify-center items-center mb-4 relative">
                                <h2 id="modalTitle-{{ $movie['id'] }}" class="text-3xl font-bold text-center">{{ $movie['title'] }}</h2>
                                <!-- Close Button, absolutely positioned in the top-right corner -->
                                <button class="absolute top-0 right-0 text-black text-2xl" onclick="closeModal('{{ $movie['id'] }}')">×</button>
                            </div>

                            <!-- Poster and Description Row -->
                            <div class="flex flex-col md:flex-row mb-4">
                                <!-- Poster on the left side -->
                                <div class="md:w-1/3 mb-4 md:mb-0">
                                    <img id="modalPoster-{{ $movie['id'] }}" src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-full h-48 object-cover">
                                </div>
                                <!-- Description on the right side -->
                                <div class="md:w-1/2 flex flex-col justify-start p-4">
                                    <p id="modalOverview-{{ $movie['id'] }}" class="text-gray-700 overflow-y-auto h-48">{{ $movie['overview'] }}</p>
                                </div>
                            </div>

                            <!-- Trailer Row -->
                            <div class="w-full mx-auto">
                                <iframe id="modalTrailer-{{ $movie['id'] }}" class="w-full h-64 mx-auto" src="{{ $movie['trailer_url'] }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
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
                    <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg cursor-pointer" onclick="showModal({{ json_encode($movie) }})">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['name'] }}" class="w-full h-64 object-cover">
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <script>
        function openModal(id) {
            // Show the specific modal based on the id
            const modal = document.getElementById('movieModal-' + id);
            modal.classList.remove('hidden');

            // Close the modal if clicking outside the modal content
            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    closeModal(id);
                }
            });
        }

        function closeModal(id) {
            // Hide the specific modal based on the id
            const modal = document.getElementById('movieModal-' + id);
            modal.classList.add('hidden');
        }
    </script>


@endsection