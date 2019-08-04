<?php
//para trabajar con sesión, siempre tiene que haber un session_start()
session_start();

if($_POST) {

  //seteo la cookie y le digo que dure 1 día
  setcookie('colorPreferido', $_POST['colorPreferido'],time() * 60 * 60 * 24);
  //me guardo en sesión el nombre del usuario
  $_SESSION['nombre'] = $_POST['nombre'];
  //lo redirecciono al perfil
  header('Location: perfil.php');

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>

  <form action="" method="post">
    <h3>Nombre:
      <input type="text" name="nombre" value="">
    </h3>

    <h3>¿Cuál es tu color preferido?
      <select name="colorPreferido">
        <option value="">Elegí un color...</option>
        //me armo un if ternario para preguntar si está seteada la cookie y si ese valor es igual al value del select (red, blue, green, etc)
        //si evalúa a verdadero, que me imprima "selected" (atributo para que aparezca seleccionada)
        //si evalua a falso, que imprima string vacío
        <option value="red" <?= isset($_COOKIE['colorPreferido']) && $_COOKIE['colorPreferido'] == 'red' ? 'selected' : '' ;?>>Rojo</option>
        <option value="blue"<?= isset($_COOKIE['colorPreferido']) && $_COOKIE['colorPreferido'] == 'blue' ? 'selected' : '' ;?>>Azul</option>
        <option value="green" <?= isset($_COOKIE['colorPreferido']) && $_COOKIE['colorPreferido'] == 'green' ? 'selected' : '' ;?>>Verde</option>
        <option value="yellow" <?= isset($_COOKIE['colorPreferido']) && $_COOKIE['colorPreferido'] == 'yellow' ? 'selected' : '' ;?>>Amarillo</option>
        <option value="orange" <?= isset($_COOKIE['colorPreferido']) && $_COOKIE['colorPreferido'] == 'orange' ? 'selected' : '' ;?>>Naranja</option>
      </select>
    </h3>
    <p>
      <input type="submit" name="setear" value="Enviar">
    </p>

  </form>

</body>
</html>
