@extends('layouts')

@section('content')
    <h1>Edit</h1>
    <form action="{{ route('movies.update', ['id' => $movie->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $movie->id }}" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" step="1" min="1900" max="2026" class="form-control" id="year" name="year" value="{{ $movie->year }}" required>
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Synopsis</label>
            <textarea class="form-control" id="synopsis" name="synopsis" rows="3" required>{{ $movie->synopsis }}</textarea>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" step="1" min="1" max="10" class="form-control" name="rating" id="rating" value="{{$movie->rating}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="{{ route('movies.index') }}" class="btn btn-primary">Back to movie list</a>
@endsection
