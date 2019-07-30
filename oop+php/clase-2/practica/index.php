<?php

  require_once 'Clases/Clientes/Cliente.php';
  require_once 'Clases/Clientes/Persona.php';

  $nuevoCliente = new Persona('Pedro', 'González', 33444555, '1980-01-01', 'pedro@gonzalez.com', 'qwerty123');

  echo $nuevoCliente->getNombre() . '<br>';
  echo $nuevoCliente->getEmail() . '<br>';
  echo '<br>';
  $nuevoCliente->setEmail('g@p.com');
  echo $nuevoCliente->getEmail() . '<br>';

  var_dump($nuevoCliente);
?>
