<?php

  // Requerimos nuestro archivo de configuración.
  require_once("php/config.php");

  // Persistencia:
  // queremos que no haya error la primera vez que se cargue el formulario
  // ya que $_POST va a estar vacío.
  $projectName = isset($_POST['projectName']) ? $_POST['projectName'] : "";
  $projectType = isset($_POST['projectType']) ? $_POST['projectType'] : "";
  $projectImage = isset($_FILES['projectImage']) ? $_FILES['projectImage'] : "";
  $email = isset($_POST['email']) ? $_POST['email'] : "";
  $pass = isset($_POST['pass']) ? $_POST['pass'] : "";
  $repass = isset($_POST['repass']) ? $_POST['repass'] : "";

  // Validación
  // Arrancamos con el array de errores vacío y lo llenamos a medida que los
  // encontremos.
  $errors = [];

  // La validación sólo tiene sentido si nos llegan datos.
  if ($_POST) {

    // Nombre del proyecto, al menos 5 caracteres.
    if (!$projectName) {
      $errors['projectName'] = "Debes ingresar un nombre.";
    } elseif (strlen($projectName) < 5) {
      $errors['projectName'] = "El nombre debe tener al menos 5 caracteres";
    }

    // Tipo del proyecto, deben haber elejido uno.
    if (!$projectType) {
      $errors['projectType'] = "Debes elejir un tipo de proyecto.";
    }

    // Imagen del proyecto, es obligatoria.
    if (!$projectImage) {
      $errors['projectImage'] = "Debes subir una imagen para tu proyecto.";
    } elseif ($projectImage["error"] != UPLOAD_ERR_OK) {
      $errors['projectImage'] = "Ocurrió un error al subir la imagen del proyecto.";
    }

    // Email en formato válido.
    if (!$email) {
      $errors['email'] = "Debes ingresar un email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "El email deber tener un formato válido.";
    }

    // Contraseña, al menos 8 caracteres.
    if (!$pass) {
      $errors['pass'] = "Debes ingresar una contraseña.";
    } elseif (strlen($pass) < 8) {
      $errors['pass'] = "La contraseña debe tener al menos 8 caracteres";
    }

    // Verificar contraseña, debe coincidir con contraseña.
    if ($pass != $repass) {
      $errors['pass'] = "Las contraseñas deben coincidir.";
    }

    // Si no hay errores, podemos proceder a guardar los datos.
    if(!$errors) {

      // Sanitización:
      // Antes de guardar los datos, tenemos que asegurarnos de limpiarlos
      // quitando cualquier elemento innesesario y encriptando datos sensibles
      // como las contraseñas.

      // Vamos a armar nuestro usuario en un array nuevo, ya que $_POST puede
      // contener elementos innesesarios.

      // Comenzamos con los datos que van directo.
      $user = [
        'projectName' => $projectName,
        'projectType' => $projectType,
        'email' => $email,
      ];

      // Seguimos por la imagen.

      // Tomamos los datos originales de la imagen.
      $oldPath = $projectImage["tmp_name"];
      $oldName = $projectImage["name"];
      $extension = pathinfo($oldName, PATHINFO_EXTENSION);

      // Formamos el nuevo nombre y el nuevo path a donde quedará guardada.
      $newName = uniqid('project-img-') . "." . $extension;
      $newPath = IMAGE_DIR . $newName;

      // Guardamos la imagen en su path final y la agregamos al array de usuario.
      move_uploaded_file($oldPath, $newPath);
      $user['projectImage'] = $newName;

      // Seguimos por la contraseña que debemos encriptar.
      $user['pass'] = password_hash($pass, PASSWORD_DEFAULT);

      // Si ya existe un archivo de usuarios, los traemos.
      if (file_exists(USERS_FILE)) {
        $allUsers = file_get_contents(USERS_FILE);
      // Si no existe, creamos un JSON con un array vacío.
      } else {
        $allUsers = '[]';
      }
      // Pasamos el formato JSON a un array de PHP para poder trabajarlo.
      $allUsers = json_decode($allUsers, true);

      // Vamos a querer identificar a nuestros usuarios, así que les ponemos un
      // ID numérico.
      $user['id'] = count($allUsers) + 1;

      // Agregamos el nuevo usuario.
      $allUsers[] = $user;

      // Salvamos los usuarios.
      $allUsers = json_encode($allUsers);
      file_put_contents(USERS_FILE, $allUsers);

      // Asumimos que todo anduvo de maravilla y enviamos al usuario a una
      // pantalla de éxito.
      header("location: registro-exitoso.php?userId={$user['id']}");
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Formulario de Registro | Proyectos DH</title>
  </head>
  <body>
    <header>
      <h1>Formulario de Registro | Proyectos DH</h1>
    </header>
    <div class="container">
      <main>
        <div class="register-form">
          <!--  Como vamos a enviar archivos necesitamos que el enctype sea
                multipart/form-data -->
          <form method="post" action="" enctype="multipart/form-data">

            <div class="row">
              <label> Nombre del grupo
                <input type="text" name="projectName" value="<?php echo $projectName ?>">
              </label>
            </div>
            <?php if (isset($errors['projectName'])) : ?>
              <p class="errors"><?php echo $errors['projectName'] ?></p>
            <?php endif; ?>

            <div class="row">
              <label> Tipo de proyecto
                <select name="projectType">
                  <option value="">Seleccione un tipo</option>
                  <option value="Marketplace" <?php echo $projectType == 'Marketplace' ? 'selected' : '' ?>>Marketplace</option>
                  <option value="Red social" <?php echo $projectType == 'Red social' ? 'selected' : '' ?>>Red social</option>
                  <option value="Juego de preguntas" <?php echo $projectType == 'Juego de preguntas' ? 'selected' : '' ?>>Juego de preguntas</option>
                </select>
              </label>
            </div>
            <?php if (isset($errors['projectType'])) : ?>
              <p class="errors"><?php echo $errors['projectType'] ?></p>
            <?php endif; ?>

            <div class="row">
              <label> Imagen
                <input type="file" name="projectImage">
              </label>
            </div>
            <?php if (isset($errors['projectImage'])) : ?>
              <p class="errors"><?php echo $errors['projectImage'] ?></p>
            <?php endif; ?>

            <div class="row">
              <label> Email
                <input type="text" name="email"  value="<?php echo $email ?>">
              </label>
            </div>
            <?php if (isset($errors['email'])) : ?>
              <p class="errors"><?php echo $errors['email'] ?></p>
            <?php endif; ?>

            <div class="row">
              <label> Contraseña
                <input type="password" name="pass" value="">
              </label>
            </div>
            <?php if (isset($errors['pass'])) : ?>
              <p class="errors"><?php echo $errors['pass'] ?></p>
            <?php endif; ?>

            <div class="row">
              <label> Confirme contraseña
                <input type="password" name="repass" value="">
              </label>
            </div>
            <?php if (isset($errors['repass'])) : ?>
              <p class="errors"><?php echo $errors['repass'] ?></p>
            <?php endif; ?>

            <div class="row">
              <button type="submit">Enviar</button>
            </div>
          </form>
        </div>
      </main>
    </div>
    <footer>
      <h2>Formulario de Registro | Proyectos DH</h2>
    </footer>
  </body>
</html>
