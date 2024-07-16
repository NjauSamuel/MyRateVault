<!-- resources/views/my-movies/select.blade.php -->
@extends('base')

@section('title', 'Select Movie')

@section('content')
<div class="container">
    <h1 class="heading">Select Movie</h1>
    @foreach ($options as $movie)
        <div class="ml-8 mr-4 max-w-96">
            <p class=" py-2 ">
                <a href="{{ route('my-movies.find_movie', ['id' => $movie['id']]) }}">{{ $movie['title'] }} - {{ $movie['release_date'] }}</a>                
            </p>
            <hr class="border-slate-800"/>
        </div>
    @endforeach
</div>
@endsection
