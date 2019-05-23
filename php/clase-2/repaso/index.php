<?php
  $numeros = [1,3,5,6,8,12,23,47];
  //$numeros = [];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Repaso de Arrays</h1>
    <section>
        <h3>Recorremos el array</h3>
        <?php for ($i=0; $i < count($numeros); $i++) : ?>
          <p><?= $numeros[$i] ?></p>
        <?php endfor ?>
    </section>
    <section>
        <h3>Recorremos el array inversamente</h3>
        <?php for ($i= count($numeros) - 1; $i >= 0 ; $i--) : ?>
          <p><?= $numeros[$i] ?></p>
        <?php endfor ?>
    </section>
    <section>
        <h3>Recorremos el array de a 2 en 2</h3>
        <?php for ($i=0; $i < count($numeros); $i+=2) : ?>
          <p><?= $numeros[$i] ?></p>
        <?php endfor ?>
    </section>
    <section>
        <h3>Recorremos el array sin el 12</h3>
        <?php for ($i=0; $i < count($numeros); $i++) :
          if ($numeros[$i] == 12) {
            continue;
          }
        ?>
          <p><?= $numeros[$i] ?></p>
        <?php endfor ?>
    </section>
    <section>
        <h3>Recorremos el array hasta el 12</h3>
        <?php for ($i=0; $i < count($numeros); $i++) : ?>
          <p><?= $numeros[$i] ?></p>
        <?php
          if ($numeros[$i] == 12) {
            break;
          }
          endfor ?>
    </section>
    <section>
        <h3>Recorremos el array hasta el 12 y salimos</h3>
        <?php for ($i=0; $i < count($numeros); $i++) : ?>
          <p><?= $numeros[$i] ?></p>
        <?php
          if ($numeros[$i] == 12) {
            //return $i;
          }
          endfor ?>
    </section>
    <section>
        <h3>Recorremos el array hasta el 12 y salimos</h3>
        <?php for ($i=0; $i < count($numeros); $i++) : ?>
          <p><?= $numeros[$i] ?></p>
        <?php
          if ($numeros[$i] == 12) {
            //return $i;
          }
          endfor ?>
    </section>
    <section>
        <h3>Recorremos el array despues del exit</h3>
    </section>
    <section>
      <h3>Recorremos el array con un do - while</h3>
      <?php
      $i = 0;
      do {
        echo "<p>{$numeros[$i]}</p>";
        $i++;
      } while ($i < count($numeros));
       ?>
    </section>
    <section>
      <h3>Recorremos el array con un while </h3>
      <?php
      $i = 0;
      while ($i < count($numeros)) {
        echo "<p>{$numeros[$i]}</p>";
        $i++;
      }
       ?>
    </section>
    <section>
      <h3>Recorremos el array con un while inversamente </h3>
      <?php
      $i = count($numeros) - 1;
      $pares = 0;
      while ($i <= 0) {
        echo "<p>{$numeros[$i]}</p>";
        if ($numeros[$i] % 2 == 0) {
          $pares++;
        }
        $i--;
      }
       ?>
       <p>Hay <?= $pares; ?> números pares.</p>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
  </body>
</html>
