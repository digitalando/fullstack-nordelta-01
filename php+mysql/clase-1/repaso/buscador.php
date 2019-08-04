<?php

include_once "pdo.php";
include_once "moviesController.php";

// $query = isset($_GET['q']) ? $_GET['q'] : '';
$query = $_GET['q'] ?? '';

$movies = getMoviesByTitle($dbConn, $query);
//$moviesCount = getMoviesCountByTitle($dbConn, $query);
$moviesCount = count($movies);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Buscador</title>
  </head>
  <body>
    <form method="get">
      <label for="">
        Búsqueda:
        <input type="text" name="q" value="<?php echo $query ?>">
        <button type="submit">¡Vaya y busque!</button>
      </label>
    </form>
    <hr>
    <?php if($movies) : ?>
        <h2>Se han encontrado <?php echo $moviesCount ?> resultados: <em></em></h2>
      <?php foreach ($movies as $movie) : ?>
        <article>
          <h3><?php echo $movie['title'] ?></h3>
          <p><strong>Rating: </strong><?php echo $movie['rating'] ?></p>
          <p><strong>Premios: </strong><?php echo $movie['awards'] ?></p>
        </article>
        <hr>
      <?php endforeach; ?>
    <?php else : ?>
      <article>
        <h3>No se encontraron resultados, para tu búsqueda: <em><?php echo $query ?></em></h3>
      </article>
    <?php endif; ?>
  </body>
</html>
