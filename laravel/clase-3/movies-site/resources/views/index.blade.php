@extends('layouts.app')

@section('title', 'Movies Site - Inicio')

@section('content')
  <section class="jumbotron text-center">
    <h1 class="jumbotron-heading">Bienvenidos a Movie Site</h1>
    <p class="text-muted">La más grande colección de películas, series y actores.</p>
    <p class="text-muted"><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</em></p>
  </section>
  <section>
    <div class="container">
      <div class="card-deck">
        <div class="card shadow-sm">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Películas</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="{{ route('movies.index') }}" class="btn btn-primary">Ver películas</a>
          </div>
        </div>
        <div class="card shadow-sm">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Series</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="{{ route('series.index') }}" class="btn btn-primary">Ver series</a>
          </div>
        </div>
        <div class="card shadow-sm">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Actores</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="{{ route('actors.index') }}" class="btn btn-primary">Ver actores</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
