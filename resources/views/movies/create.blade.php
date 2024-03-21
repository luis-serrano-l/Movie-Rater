@extends('layouts')

@section('content')
    <h1>New movie</h1>
    <form method="POST" action="{{ route('movies.store') }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" step="1" min="1900" max="2026" class="form-control" id="year" name="year" required>
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Synopsis</label>
            <textarea class="form-control" id="synopsis" name="synopsis" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" step="1" min="1" max="10" class="form-control" name="rating" id="rating" required> 
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <a href="{{ route('movies.index') }}" class="btn btn-primary">Back to movie list</a>
@endsection