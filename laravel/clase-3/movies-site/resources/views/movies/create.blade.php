<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listado de películas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">

      <h1>Crear una nueva película</h1>
      <form action="/movies" method="post">
        @csrf

        <div class="form-group">
          <label>title: <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" > </p>

          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>




        <div class="form-group">
          <label>rating: <input type="text" name="rating" value="{{ old('rating') }}"> </p>
        </div>

        <div class="form-group">
          <label>awards: <input type="text" name="awards" value="{{ old('awards') }}"> </p>
        </div>

        <div class="form-group">
          <label>release_date: <input type="date" name="release_date" value="{{ old('release_date') }}"></p>
        </div>

        <div class="form-group">
          <label>length: <input type="text" name="length" value="{{ old('length') }}"> </p>
        </div>

        <button class="btn" type="submit">Enviar</button>
      </form>

      <hr>
      <a href="/movies">Volver al listado</a>
    </div>
  </body>
</html>
