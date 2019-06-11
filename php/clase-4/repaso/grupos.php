<?php
  $grupos = [
    'Grupo 1' => [
      "integrantes" => [
        "Paolella, Gonzalo",
        "Marocchi, Ezequiel",
        "Ariztizabal, Joaquin",
      ],
      "proyecto" => [
        "nombre" => "",
        "tema" => "Ecommerce de celulares",
        "repo" => "",
      ],
    ],
    'Grupo 2' => [
      "integrantes" => [
        "Guiñazu, Victoria",
        "Paula María, Ghirlanda",
        "Sangineto, Maria Florencia",
      ],
      "proyecto" => [
        "nombre" => "",
        "tema" => "Ecommerce de verduras",
        "repo" => "",
      ],
    ],
    'Grupo 3' => [
      "integrantes" => [
        "Alvarez, Joaquin",
        "Poggi, Natalia",
        "Villanueba, Teodoro",
      ],
      "proyecto" => [
        "nombre" => "",
        "tema" => "Ecommerce de celulares",
        "repo" => "",
      ],
    ],
    'Grupo 4' => [
      "integrantes" => [
        "Boubee, Juan",
        "Saguier, Violeta",
      ],
      "proyecto" => [
        "nombre" => "",
        "tema" => "Ecommerce de ???",
        "repo" => "",
      ],
    ],
    'Grupo 5' => [
      "integrantes" => [
        "Medina, Vicente",
        "Guaglianone, Fabrizio",
        "Pavlovsky, Beltran",
      ],
      "proyecto" => [
        "nombre" => "",
        "tema" => "Ecommerce de vapers",
        "repo" => "",
      ],
    ],
    'Grupo 6' => [
      "integrantes" => [
        "Perez, Juan Bautista",
        "Kipperband, Marcos",
        "Ghidini, Mateo",
        "Amenabar, Santiago",
      ],
      "proyecto" => [
        "nombre" => "",
        "tema" => "Ecommerce de celulares",
        "repo" => "",
      ],
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
        <?php foreach ($grupos as $nombreGrupo => $datos) : ?>
          <div class="group">
            <h3><?php echo $nombreGrupo; ?></h3>
            <?php foreach ($datos['integrantes'] as $integrante) : ?>
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
