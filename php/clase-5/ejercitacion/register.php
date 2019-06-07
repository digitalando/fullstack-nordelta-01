<?php

function longitudMinima($field, $min) {
  return strlen($field) >= $min;
}

function esEmailValido($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/*
1.Modificar ​register.html/register.php​ para que:
a.Guarde los datos del usuario en un array. (la contraseña debe esta rencriptada!)
b.Convierta el array en JSON.
c.Guarde el usuario en un archivo de texto.
Nota: La registración es un proceso que se ejecuta muchas veces, por lo tanto,cada usuario nuevo, debe agregarse al final del array de usuarios.
Es recomendable que el archivo contenga una estructura de tipo:{“usuarios”: [{...},{...},{...},{...},{...}]} en donde {...} es el json_encode del array con los datos del usuario particular que se registra en el momento del guardado.Además, se considera que el formulario de registración ya se encuentra validado.
*/


/* Atajamos el caso de que no haya un POST
  ej: la primera vez que el usuario entra al formulario */

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$user = isset($_POST['user']) ? $_POST['user'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
$repass = isset($_POST['repass']) ? $_POST['repass'] : '';


/* Si nos llega un POST, validamos el formulario */

$errors = [];

if ($_POST) {
  /* validamos el campo de name */
  if (!longitudMinima($name, 3)) {
    $errors['name'] = "El nombre debe tener al menos 3 caracteres";
  }

  if (!$email) {
    $errors['email'] = "Debes ingresar un email.";
  } elseif (!esEmailValido($email)) {
    $errors['email'] = "El email deber tener un formato válido.";
  }

  if (!longitudMinima($email, 10)) {
    $errors['email'] = "El email debe tener al menos 10 caracteres";
  }

  if (!longitudMinima($user, 5)) {
    $errors['user'] = "El usuario debe tener al menos 5 caracteres";
  }

  if (!longitudMinima($pass, 8)) {
    $errors['pass'] = "La clave debe tener al menos 8 caracteres";
  }

  if ($pass != $repass) {
    $errors['repass'] = "La clave debe coincidir en ambos campos";
  }


}

/* Si el form valida, guardamos el usuario */
if (!$errors) {
  /* Sanitización - Limpiamos los datos y armamos nuestro array de usuario */

  /* Encriptamos la contraseña */
  $pass = password_hash($pass, PASSWORD_DEFAULT);

  /* Armamos nuestro array de usuario */
  $newUser = [
    'name' => $name,
    'email' => $email,
    'user' => $user,
    'pass' => $pass,
  ];

  /* Traer los usuarios existentes del archivo JSON y agregar el usuarios nuevo */

  $allUsers = file_get_contents('users.json');

  /* Los pasamos a array de PHP */
  $allUsers = json_decode($allUsers, true);

  /* Agregamos el nuevo usuario */
  $allUsers[] = $newUser;

  /* Guardamos el archivo de usuarios */
  file_put_contents('users.json', json_encode($allUsers));

}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php if($errors) : ?>
      <div class="errors">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo $error ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="row">
          <label> Nombre
            <input type="text" name="name" value="<?php echo $name ?>">
          </label>
        </div>
        <div class="row">
          <label> Imagen
            <input type="file" name="image">
          </label>
        </div>
        <div class="row">
          <label> Email
            <input type="text" name="email" value="<?php echo $email ?>">
          </label>
        </div>
        <div class="row">
          <label> Usuario
            <input type="text" name="user" value="<?php echo $user ?>">
          </label>
        </div>
        <div class="row">
          <label> Password
            <input type="password" name="pass" value="">
          </label>
        </div>
        <div class="row">
          <label> Repetir password
            <input type="password" name="repass" value="">
          </label>
        </div>
        <div class="row">
          <button type="submit">Enviar</button>
        </div>
      </form>
  </main>
  </body>
</html>
