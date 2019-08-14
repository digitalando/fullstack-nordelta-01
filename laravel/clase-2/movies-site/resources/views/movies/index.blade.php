<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listado de películas</title>
  </head>
  <body>
    <h1>Listado de películas</h1>
    <ul>
      @foreach ($movies as $movie)
        <li><a href="movies/show/{{ $movie->id }}">{{ $movie->title }}</a></li>
      @endforeach
    </ul>
  </body>
</html>
