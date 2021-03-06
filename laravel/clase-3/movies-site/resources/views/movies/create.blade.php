@extends('layouts.app')

@section('title', 'Movies Site - Inicio')

@section('content')

<section class="jumbotron text-center">
  <h1 class="jumbotron-heading">Agregar película</h1>
</section>

<section>
  <div class="container">

    <form action="{{ route('movies.store') }}" method="post">
      @csrf

      <div class="form-group">
        <label>Título:
          <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" >
          @error('title')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </label>

      </div>

      <div class="form-group">
        <label>rating:
          <input type="text" name="rating" value="{{ old('rating') }}" class="form-control @error('rating') is-invalid @enderror">
          @error('rating')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </label>
      </div>

      <div class="form-group">
        <label>awards:
          <input type="text" name="awards" value="{{ old('awards') }}" class="form-control @error('awards') is-invalid @enderror">
          @error('awards')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </label>
      </div>

      <div class="form-group">
        <label>release_date:
          <input type="date" name="release_date" value="{{ old('release_date') }}" class="form-control @error('release_date') is-invalid @enderror">
          @error('release_date')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </label>
      </div>

      <div class="form-group">
        <label>length:
          <input type="text" name="length" value="{{ old('length') }}" class="form-control @error('length') is-invalid @enderror">
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
