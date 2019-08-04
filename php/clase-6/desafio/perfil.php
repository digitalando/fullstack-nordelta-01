<?php
//para trabajar con sesión, siempre tiene que haber un session_start()
session_start();
//pregunto si hubo algo enviado por formulario
if($_POST) {
  //y pregunto si llegó el índice $_POST['resetear']
  if($_POST['resetear']) {
    //elimino la cookie colorPreferido
    setcookie('colorPreferido', '', -1);
    //redirecciono a la misma página
    header('Location: perfil.php');

    //Para tener en cuenta--> cuando hago un setcookie() la cookie todavía no existe en mi navegador
    //recién se crea cuando refresco el navegador
    //por eso lo redirecciono a la misma página, para que se actualice en ese momento

  }

}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <style>
    .link {
       display:inline-block;
       padding:8px;
       text-decoration:none;
       background-color:rgba(0,0,0,0.8);
       color:white;
       margin-top: 12px;
    }
  </style>
</head>
<body style="background-color:<?= isset($_COOKIE['colorPreferido']) ? $_COOKIE['colorPreferido'] : '';?> ">

  <h1>Te damos la bienvenida <?= isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?></h1>

  <form action="" method="post">
    <input type="submit" name="resetear" value="Resetear colo de fondo">
  </form>

<a href="register.php" class="link">Volver...</a>

</body>
</html>
