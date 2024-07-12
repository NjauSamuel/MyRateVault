{{-- resources/views/edit.blade.php --}}
@extends('base')

@section('title', 'Edit Movies')

@section('content')
<div class="content p-6">
    <h1 class="heading">Edit Movie Rating</h1>

    <div class="form-title">
        <p class="text-2xl font-bold">Title: {{ $movie->title }}</p>
    </div> 
  

  <form action="{{ route('my-movies.update', $movie->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div>
          <label for="rating" class="block text-sm font-medium text-gray-700">Your Rating Out of 10 e.g. 7.5</label>
          <input type="text" name="rating" id="rating" value="{{ old('rating', $movie->rating) }}" class="block w-full rounded-sm border-slate-300 pl-2 py-1 shadow-sm sm:text-sm">
          @error('rating')
              <div class="text-red-600 text-sm">{{ $message }}</div>
          @enderror
      </div>

      <div>
          <label for="review" class="block text-sm font-medium text-gray-700">Your Review</label>
          <textarea type="text" name="review" id="review" class="custom-height w-full rounded-sm border-slate-300 pl-3 py-2 shadow-sm">{{ old('review', $movie->review) }}</textarea>
          @error('review')
              <div class="text-red-600 text-sm">{{ $message }}</div>
          @enderror
      </div>

      <div>
          <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Done</button>
      </div>
  </form>

</div>
@endsection
