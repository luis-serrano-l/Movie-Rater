<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $movies = Movie::all();

        return view('movies.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|between:1900,2026',
            'synopsis' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,10'
        ]);

        $movie = Movie::create($validated);

        return redirect(route('movies.show', ['movie' => $movie]))->with('success', 'Movie has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('movies.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $movie = Movie::findOrFail($id);

        return view('movies.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|between:1900,2026',
            'synopsis' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,10'
        ]);

        $movie = Movie::findOrFail($id);

        $movie->update($validated);
        return redirect(route('movies.show', ['movie' => $movie]))->with('success', 'Movie has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect(route('movies.index'));
    }
}
