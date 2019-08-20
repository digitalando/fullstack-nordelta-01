<?php
  require_once 'model.php';

  function table() {
    return 'projects';
  }

  function allProyects($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM " . table());
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function saveProyect($pdo, $data) {
    $stmt = $pdo->prepare(
      "INSERT INTO " . table() . " VALUES (NULL, :name, :type, :image, :email, :pass);"
    );

    $stmt->bindParam(':name', $data['projectName']);
    $stmt->bindParam(':type', $data['projectType']);
    $stmt->bindParam(':image', $data['image']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':pass', $data['pass']);

    $stmt->execute();

    return $pdo->lastInsertId();
  }
?>
