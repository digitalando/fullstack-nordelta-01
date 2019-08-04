<?php

  $ceu = [
    "Argentina" => [
      "ciudades" => ["Buenos Aires", "Córdoba", "Santa Fé"],
      "esAmericano" => true,
    ],
    "Brasil" => [
      "ciudades" => ["Brasilia", "Rio de Janeiro", "Sao Pablo"],
      "esAmericano" => true,
    ],
    "Colombia" => [
      "ciudades" => ["Cartagena", "Bogota", "Barranquilla"],
      "esAmericano" => true,
    ],
    "Francia" => [
      "ciudades" => ["Paris", "Nantes", "Lyon"],
      "esAmericano" => false,
    ],
    "Italia" => [
      "ciudades" => ["Roma", "Milan", "Venecia"],
      "esAmericano" => false,
    ],
    "Alemania" => [
      "ciudades" => ["Munich", "Berlin", "Frankfurt"],
      "esAmericano" => false,
    ],
  ];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php foreach ($ceu as $pais => $datosPais) : ?>
      <?php if ($datosPais["esAmericano"]) : ?>
        <p>Las cidudad de <strong><?php echo $pais ?></strong> son:</p>
        <?php foreach ($datosPais["ciudades"] as $ciudad) : ?>
          <p>- <?php echo $ciudad ?></p>
        <?php endforeach ?>
      <?php endif ?>
    <?php endforeach ?>
  </body>
</html>

<hr>

<?php
 foreach ($ceu as $pais => $datosPais) :
   if ($datosPais["esAmericano"]) :
    echo "<p>Las cidudad de <strong> $pais </strong> son:</p>";
     foreach ($datosPais["ciudades"] as $ciudad) :
      echo "<p>- $ciudad </p>";
    endforeach;
  endif;
endforeach;
?>
