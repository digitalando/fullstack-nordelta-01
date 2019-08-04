<?php
/*
Generar un archivo llamado funciones.php:

Definir una función mayor() que reciba 3 números y devuelva el mayor.
Definir una función tabla() que reciba un parámetro base, un parámetro límite, y devuelve un array con la secuencia de números desde el numero base hasta el numero limite.
Modificar mayor() para que si recibe sólo 2 parámetros, compare a esos dos números con el número 100.
Modificar tabla para que si recibe un sólo parámetro utilice el número 100.
*/

function mayor($num1, $num2, $num3 = 100) {
  if ($num1 > $num2 && $num1 > $num3 ) {
    return $num1;
  } elseif ($num2 > $num1 && $num2 > $num3) {
    return $num2;
  } elseif ($num3 > $num1 && $num3 > $num2) {
    return $num3;
  } else {
    return 0;
  }
}

function tabla ($base, $limite = 100) {
  // Inicio, mis contadores
  $resultado = [];

  // For, here goes the magic
  for($i = 1; $i <= $limite; $i++) {
    $resultado[] = $base * $i;
  }

  // Devuelvo la magia
  return $resultado;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <section>
    <h4>mayor(10, 20, 30)</h4>
    <p>
      <?= mayor(10, 20, 30) ?>
    </p>
  </section>
  <hr>

  <section>
    <h4>mayor(10, 10, 10)</h4>
    <p>
      <?php
        $numMayor = mayor(10, 10, 10);

        if ($numMayor) {
          echo "$numMayor";
        } else {
          echo "Son todos iguales";
        }
      ?>
    </p>
  </section>
  <hr>

  <section>
    <h4>mayor(10, 20)</h4>
    <p>
      <?= mayor(10, 20) ?>
    </p>
  </section>
  <hr>


  <section>
    <h4>tabla(10, 20)</h4>
    <p>
      <pre>
      <?//= var_dump(tabla(10, 20)) ?>
      <?= print_r(tabla(10, 20)) ?>
      </pre>
    </p>
  </section>
  <hr>

  <?= print_r(tabla(10), true) ?>


  <hr>

  </body>
</html>
