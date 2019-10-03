<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::paginate();

        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // 'title' => 'bail|required|unique:posts|max:255',
      // 'body' => 'required',

      $request->validate([
        'title' => 'required',
        'rating' => 'required',
        'awards' => 'required',
        'release_date' => 'required',
        'length' => 'required',
      ],[
        'required' => 'El campo :attribute es requerido',
      ]);

      $movie = Movie::create($request->all());

      return redirect()->route('movies.show', ['movie' => $movie->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
      return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
      $request->validate([
        'title' => 'required',
        'rating' => 'required',
        'awards' => 'required',
        'release_date' => 'required',
        'length' => 'required',
      ],[
        'required' => 'El campo :attribute es requerido',
      ]);

      $movie->update($request->all());

      return redirect()
        ->route('movies.show', $movie->id)
        ->with('success','Se actualizó la película');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        dd($movie->actors);
        $movie->actors->detach();
        $movie->delete();

        return redirect()
          ->route('movies.list')
          ->with('success','Se eliminó la película');
    }
}
