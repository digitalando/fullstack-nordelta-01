<?php
  // print_r($_POST);
  // echo "El nombre enviado es: " . $_POST["fullname"];

  /* 1. Validar si los datos son correctos
      Email en formato de Email
      Usuario 5 o más caracteres
      Password 8 caracteres
  */

  $errors = [];

  $name = isset($_POST['name']) ? $_POST['name'] : "";
  $email = isset($_POST['email']) ? $_POST['email'] : "";
  $user = isset($_POST['user']) ? $_POST['user'] : "";
  $pass = isset($_POST['pass']) ? $_POST['pass'] : "";

  /* Validación */

  if ($_POST) {
    /* Nombre 3 o más caracteres */
    if (!$name) {
      $errors['name'] = "Debes ingresar un nombre.";
    } elseif (strlen($name) < 3) {
      $errors['name'] = "El nombre debe tener al menos 3 caracteres";
    }

    /* Email en formato válido */
    if (!$email) {
      $errors['email'] = "Debes ingresar un email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "El email deber tener un formato válido.";
    }

    /* Usuario 5 o más caracteres */
    if (!$user) {
      $errors['user'] = "Debes ingresar un usuario.";
    } elseif (strlen($user) < 5) {
      $errors['user'] = "El usuario debe tener al menos 5 caracteres";
    }

    /* Nombre 3 o más caracteres */
    if (!$pass) {
      $errors['pass'] = "Debes ingresar una contraseña.";
    } elseif (strlen($pass) < 8) {
      $errors['pass'] = "La contraseña debe tener al menos 8 caracteres";
    }
  }

  // print_r($errors);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Formulario de Registro | Verdulería Online</title>
  </head>
  <body>
    <div class="container">
    <header>
      <h1>Formulario de Registro | Verdulería Online</h1>
    </header>
    <main>
      <!--
      <div class="errors">
        <ul>
          <?php foreach ($errors as $field => $error) : ?>
            <li><?php echo $error ?></li>
          <?php endforeach ?>
        </ul>
      </div>
      -->
      <form method="post">
        <div class="row">
          <label> Nombre
            <input type="text" name="name" value="<?php echo $name ?>">
          </label>
          <?php if (isset($errors['name'])) : ?>
            <p class="errors"><?php echo $errors['name'] ?></p>
          <?php endif; ?>
        </div>
        <div class="row">
          <label> Email
            <input type="text" name="email" value="<?php echo $email ?>">
          </label>
          <?php if (isset($errors['email'])) : ?>
            <p class="errors"><?php echo $errors['email'] ?></p>
          <?php endif; ?>
        </div>
        <div class="row">
          <label> Usuario
            <input type="text" name="user" value="<?php echo $user ?>">
          </label>
          <?php if (isset($errors['user'])) : ?>
            <p class="errors"><?php echo $errors['user'] ?></p>
          <?php endif; ?>
        </div>
        <div class="row">
          <label> Password
            <input type="password" name="pass" value="">
          </label>
          <?php if (isset($errors['pass'])) : ?>
            <p class="errors"><?php echo $errors['pass'] ?></p>
          <?php endif; ?>
        </div>
        <div class="row">
          <button type="submit">Enviar</button>
        </div>
      </form>
    </main>
    <footer>
      <h2>Formulario de Registro | Verdulería Online</h2>
    </footer>
  </div>
  </body>
</html>
