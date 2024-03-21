@extends('layouts')

@section('content')
    <h1>Movies</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>
                        <a href="{{ route('movies.show', $movie->id) }}">Show</a>
                        <a href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                        <form action="{{ route('movies.destroy', ['id' => $movie->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('movies.create') }}" class="btn btn-success">Create</a>
@endsection
