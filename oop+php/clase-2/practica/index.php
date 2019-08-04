<?php

  require_once 'includes.php';

  // $nuevoCliente = new Persona('Pedro', 'González', 33444555, '1980-01-01', 'pedro@gonzalez.com', 'qwerty123');

  // echo $nuevoCliente->getNombre() . '<br>';
  // echo $nuevoCliente->getEmail() . '<br>';
  // echo '<br>';
  // $nuevoCliente->setEmail('g@p.com');
  // echo $nuevoCliente->getEmail() . '<br>';


  // $nuevaPyme = new Pyme('Juanito Hnos S.A.', '30-1212321-01', 'juanito@hnos.com', 'qwerty123');
  // echo '<pre>';
  // var_dump($nuevaPyme);
  //
  // $nuevaMultinacional = new Multinacional('Juanito Hnos S.A.', '30-1212321-01', 'juanito@hnos.com', 'qwerty123');
  // $nuevaMultinacional->setRazonSocial('Multicorp INC');
  // echo '<pre>';
  // var_dump($nuevaMultinacional);

  $cuenta = new Clasic(32587425394754235);

  $cuenta->setBalance(10000000);

  echo 'Balance actual: ' . $cuenta->getBalance() . '<br>';

  $cuenta->debitar(50000, 'banelco');

  echo 'Balance actual: ' . $cuenta->getBalance() . '<br>';
?>
