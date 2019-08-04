<?php
  $dbName = "movies_db";
  $dsn = "mysql:dbname={$dbName};host=127.0.0.1;port=3306;charset=utf8";
  $user = "lando";
  $pass = "mysqll4nd0";

  $dbConn = new PDO($dsn, $user, $pass);

  try {
    $dbConn = new PDO($dsn, $user, $pass);
    // Hacer que MySQL muestre los errores de consultas.
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $exception) {
    echo $exception->getMessage();
  }
?>
