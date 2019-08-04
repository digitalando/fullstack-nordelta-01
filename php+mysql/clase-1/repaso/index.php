<?php

include_once "pdo.php";
include_once "moviesController.php";

$movies = getAllMovies($dbConn);

foreach ($movies as $movie) {
?>
  <article>
    <h3><?php echo $movie['title'] ?></h3>
    <p><strong>Rating: </strong><?php echo $movie['rating'] ?></p>
    <p><strong>Premios: </strong><?php echo $movie['awards'] ?></p>
  </article>
  <hr>
<?php
}

?>
