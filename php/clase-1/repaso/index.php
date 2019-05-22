<?php
  $usuario = [
    "categoria" => "admin",
    "nombre" => "Joaquín",
    "apellido" => "Rodriguéz",
    "edad" => 47,
    "tematicas" => [
      "php",
      "html",
      "css",
      "js"
    ]
  ];

  $categoriasUsuarios = [
    "admin",
    "editor",
    "huesped"
  ];

  $valor = 2;

  // Información detallada de una variable
  // var_dump($usuario);

  /* Información de un array (sólo sirve para arrays) */
  // print_r($valor);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Página de perfil</title>
  </head>
  <body>
    <h1>
      <?php echo "¡Hola " . $usuario["nombre"] . "!" ?>
    </h1>
    <h2>Tus temáticas favoritas son (<?= count($usuario["tematicas"])  ?>):</h2>
    <?php /* if (count($usuario["tematicas"]) > 1) : ?>
      <ul>
        <li><?php echo $usuario["tematicas"][0] ?></li>
        <li><?php echo $usuario["tematicas"][1] ?></li>
        <li><?php echo $usuario["tematicas"][2] ?></li>
        <li><?= $usuario["tematicas"][3] ?></li>
      </ul>
    <?php endif */ ?>
    <?php
      /* cuento los elementos de un array
        https://www.php.net/manual/es/function.count.php
      */
      if (count($usuario["tematicas"]) > 1) {
        echo "<ul>";
        echo "<li>" . $usuario["tematicas"][0] . "</li>";
        echo "<li>{$usuario["tematicas"][1]}</li>";
        /* comillas dobles, el contenido es interpretado */
        echo "<li>{$usuario["tematicas"][2]}</li>";
        /* comillas simples, el contenido el literal */
        echo '<li>{$usuario["tematicas"][3]}</li>';
        echo "</ul>";
    } ?>
    <section>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </section>
    <section>
      <?php if ($usuario["categoria"] == "editor" || $usuario["categoria"] == "admin") { ?>
        <button type="button">Editar</button>
      <?php } ?>
      <?php if ($usuario["categoria"] == "admin" ) { ?>
        <button type="button">Borrar</button>
      <?php } ?>

    </section>
  </body>
</html>
