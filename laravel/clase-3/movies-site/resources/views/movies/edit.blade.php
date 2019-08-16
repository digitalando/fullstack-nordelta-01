@extends('layouts.app')

@section('title', 'Movies Site - Inicio')

@section('content')

<section class="jumbotron text-center">
  <h1 class="jumbotron-heading">Editar película</h1>
  <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">Volver al detalle</a>
  <a href="{{ route('movies.index') }}" class="btn btn-primary">Volver al listado</a>
</section>

<section>
  <div class="container">

    <form action="{{ route('movies.update', $movie->id) }}" method="post">
      @csrf
      @method('PATCH')

      <div class="form-group">
        <label>Título:
          <input type="text" name="title" value="{{ old('title', $movie->title) }}" class="form-control @error('title') is-invalid @enderror" >
          @error('title')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </label>

      </div>

      <div class="form-group">
        <label>rating:
          <input type="text" name="rating" value="{{ old('rating', $movie->rating) }}" class="form-control @error('rating') is-invalid @enderror">
          @error('rating')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </label>
      </div>

      <div class="form-group">
        <label>awards:
          <input type="text" name="awards" value="{{ old('awards', $movie->awards) }}" class="form-control @error('awards') is-invalid @enderror">
          @error('awards')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </label>
      </div>

      <div class="form-group">
        <label>release_date:
          <input type="date" name="release_date" value="{{ old('release_date', $movie->release_date) }}" class="form-control @error('release_date') is-invalid @enderror">
          @error('release_date')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </label>
      </div>

      <div class="form-group">
        <label>length:
          <input type="text" name="length" value="{{ old('length', $movie->length) }}" class="form-control @error('length') is-invalid @enderror">
          @error('length')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </label>
      </div>

      <button class="btn btn-primary" type="submit">Enviar</button>
    </form>
  </div>
</section>
@endsection
