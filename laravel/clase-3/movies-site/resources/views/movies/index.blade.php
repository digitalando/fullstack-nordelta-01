@extends('layouts.app')

@section('title', 'Movies Site - Inicio')

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif

  <section class="jumbotron text-center">
    <h1 class="jumbotron-heading">Listado de películas</h1>
    <a href="{{ route('movies.create') }}" class="btn btn-success">Agregar película</a>
  </section>

  <section>
    <div class="container">
      <div class="row">
        @foreach ($movies as $movie)
          <div class="col-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h5 class="card-title">{{ $movie->title }}</h5>
                <p>{{ $movie->actors->sortBy('first_name')->implode('first_name', ', ') }}</p>
                <p>
                  @foreach ($movie->actors as $actor)
                  <i class="fas fa-user"></i>
                  <a href="actors/{{ $actor->id }}"> {{ $actor->fullName() }}</a>
                  <br>
                  @endforeach
                </p>
                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">Ver película</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  {{ $movies->links() }}
@endsection
