@extends('base')

@section('title', 'Add Movie')

@section('content')
<div class="content p-6">
    <h1 class="heading">Add a Movie</h1>
    <form action="{{ route('my-movies.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="title" class="block text-lg font-bold text-gray-700">Movie Title:</label>
            <input
                id="title" name="title" type="text" value="{{ old('title') }}"
               class="block w-full rounded-sm border-slate-300 pl-2 py-1 shadow-sm sm:text-sm"
                required
            />
            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="inline-flex items-center px-2 py-1 border border-transparent rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm" >
                Add Movie
            </button>
        </div>
    </form>
</div>
@endsection
