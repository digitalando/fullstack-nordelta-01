<?php

// Declaración
function saludar($nombre, $apellido = '') {
  $saludo = "¡Hola $nombre";
  if ($apellido != '') {
    $saludo = $saludo . ", $apellido";
  }
  $saludo = $saludo . "!<br>";

  return $saludo;
}

echo saludar('Matías', 'Gutierrez');
echo saludar('Javier', 'G');
echo saludar('Matías');
echo saludar('Matías', 'T');

echo '<br>';

$numero1 = 2000;
$numero2 = 6000;
$numero3 = 8000;

function sumar($numero1, $numero2) {
  return $numero1 + $numero2;
}

function multiplicar($numero1, $numero2) {
  return $numero1 * $numero2;
}

function sumarGlobal($numero1) {
  global $numero2;
  return $numero1 + $numero2;
}

echo sumar(10, 78);
echo '<br>';
echo sumarGlobal(10);
?>
