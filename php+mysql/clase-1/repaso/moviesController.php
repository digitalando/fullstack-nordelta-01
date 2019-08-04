<?php
  include_once "pdo.php";

  function getAllMovies($dbConn) {

    // preparar consulta
    $statement = $dbConn->prepare("SELECT * FROM movies;");

    // $statement = $dbConn->prepare('INSERT INTO movies VALUES ();');

    // ejecutar consulta
    $statement->execute();

    // obtener resultados
    // https://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  function getMoviesByTitle($dbConn, $title) {

    $statement = $dbConn->prepare("SELECT * FROM movies WHERE title LIKE :title");

    $statement->bindValue(':title', '%' . $title . '%');

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  function getMoviesCountByTitle($dbConn, $title) {

    $statement = $dbConn->prepare("SELECT * FROM movies WHERE title LIKE :title");

    $statement->bindValue(':title', '%' . $title . '%');

    $statement->execute();

    return $statement->rowCount();
  }

?>
