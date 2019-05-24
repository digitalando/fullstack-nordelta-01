<?php
  $grupos = [
    'Grupo 1' => [
      "Paolella, Gonzalo",
      "Marocchi, Ezequiel",
      "Trejo, Santiago",
      "Ariztizabal, Joaquin",
    ],
    'Grupo 2' => [
      "Guiñazu, Victoria",
      "Paula María, Ghirlanda",
      "Sangineto, Maria Florencia",
    ],
    'Grupo 3' => [
      "Alvarez, Joaquin",
      "Poggi, Natalia",
      "Villanueba, Teodoro",
    ],
    'Grupo 4' => [
      "BOUBEE, JUAN",
      "Suarez, Natalia",
      "De Larrechea, Añes",
      "Saguier, Violeta",
    ],
    'Grupo 5' => [
      "Medina, Vicente",
      "Guaglianone, Fabrizio",
      "Pavlovsky, Beltran",
    ],
    'Grupo 6' => [
      "Perez, Juan Bautista",
      "Kipperband, Marcos",
      "Ghidini, Mateo",
      "Amenabar, Santiago",
    ],
  ];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listado de grupos</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <header>
      <h1>Listado de grupos</h1>
    </header>
    <div class="container">
      <div class="groups">
        <?php foreach ($grupos as $nombreGrupo => $integrantes) : ?>
          <div class="group">
            <h3><?php echo $nombreGrupo; ?></h3>
            <?php foreach ($integrantes as $integrante) : ?>
              <p class="member"><?php echo $integrante ?></p>
            <?php endforeach ?>
          </div>
        <?php endforeach ?>
      </div>
    </div>
    <footer>
      <h2>&copy; <?php echo date('Y') ?> Fullstack Nordelta</h2>
    </footer>
  </body>
</html>
