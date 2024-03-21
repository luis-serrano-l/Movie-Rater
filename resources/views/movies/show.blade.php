@extends('layouts')

@section('content')
    <h1>Movie details</h1>
    <h2>Title: {{ $movie->title }}</h2>
    <h2>Year: {{ $movie->year }}</h2>
    <h2>Synopsis: {{ $movie->synopsis }}</h2>
    <h2>Rating: {{ $movie->rating }}</h2>
    <a href="{{ route('movies.index') }}" class="btn btn-primary">Back to movie list</a>
@endsection
