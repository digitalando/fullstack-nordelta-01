<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listado de películas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1>Listado de películas</h1>
      <a class="btn" href="/movies/create">Agregar película</a>
      <ul>
        @foreach ($movies as $movie)
        <li><a href="movies/{{ $movie->id }}">{{ $movie->title }}</a>
          <ul>
            @foreach ($movie->actors as $actor)
            <li><a href="actors/{{ $actor->id }}">{{ $actor->fullName() }}</a></li>
            @endforeach
          </ul>
        </li>
        @endforeach
      </ul>
      {{ $movies->links() }}
    </div>
  </body>
</html>
