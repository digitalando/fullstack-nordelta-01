<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Detalle de actores</title>
  </head>
  <body>
    <h1>{{ $actor->fullName() }}</h1>
    <p>rating: {{ $actor->rating }}</p>
    <hr>
    <a href="/movies">Volver al listado</a>
  </body>
</html>
