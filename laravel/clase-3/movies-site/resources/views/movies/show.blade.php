@extends('layouts.app')

@section('title', 'Movies Site - Inicio')

@section('content')

  <section class="jumbotron text-center">
    <h1 class="jumbotron-heading">Detalle de película</h1>
    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-success">Editar película</a>
    <a href="{{ route('movies.destroy', $movie->id) }}" class="btn btn-danger">Borrar película</a>
    <a href="{{ route('movies.index') }}" class="btn btn-primary">Volver al listado</a>
  </section>

  <section class="jumbotron text-center">
    <h1 class="jumbotron-heading">{{ $movie->title }}</h1>
    <p>rating: {{ $movie->rating }}</p>
    <p>awards: {{ $movie->awards }}</p>
    <p>release_date: {{ $movie->release_date }}</p>
    <p>length: {{ $movie->length }}</p>
  </section>

@endsection
