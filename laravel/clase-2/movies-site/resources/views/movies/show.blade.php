<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listado de películas</title>
  </head>
  <body>
    <h1>{{ $movie->title }}</h1>
    <p>rating: {{ $movie->rating }}</p>
    <p>awards: {{ $movie->awards }}</p>
    <p>release_date: {{ $movie->release_date }}</p>
    <p>length: {{ $movie->length }}</p>
    <hr>
    <a href="/movies">Volver al listado</a>
  </body>
</html>
