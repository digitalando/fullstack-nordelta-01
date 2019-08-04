<?php
  /*
  if (isset($bodyClass))
  {
    echo "<h1>Tenemos un bodyClass</h1>";
  }
  else {
    echo "<h1><strong>No</strong> tenemos un bodyClass</h1>";
  }
  */

  /*
  echo isset($bodyClass) ? "<h1>Tenemos un bodyClass</h1>" : "<h1><strong>No</strong> tenemos un bodyClass</h1>";
  */
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Respuestos de Mac | <?= isset($pageTitle) ? $pageTitle : '' ?></title>
  </head>
  <body class="<?= isset($bodyClass) ? $bodyClass : '' ?>"> 
    <header>
      <?php include('partials/nav.php') ?>
    </header>
    <main>
