<?php

  // Requerimos nuestro archivo de configuración.
  require_once("php/config.php");
  require_once("php/registerController.php");

  // La validación sólo tiene sentido si nos llegan datos.
  if ($_POST) {
    $errors = validateUserForm($_POST, $_FILES);

    // Si no hay errores, podemos proceder a guardar los datos.
    if(!$errors) {

      $user = createUser($_POST);
      $user['projectImage'] = uploadProjectImage($_FILES);

      $user['id'] = saveUser($user);

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
                <input type="text" name="projectName" value="<?php echo old('projectName'); ?>">
              </label>
            </div>
            <?php if (isset($errors['projectName'])) : ?>
              <p class="errors"><?php echo $errors['projectName'] ?></p>
            <?php endif; ?>

            <div class="row">
              <label> Tipo de proyecto
                <select name="projectType">
                  <option value="">Seleccione un tipo</option>
                  <option value="Marketplace" <?php echo old('projectType') == 'Marketplace' ? 'selected' : '' ?>>Marketplace</option>
                  <option value="Red social" <?php echo old('projectType') == 'Red social' ? 'selected' : '' ?>>Red social</option>
                  <option value="Juego de preguntas" <?php echo old('projectType') == 'Juego de preguntas' ? 'selected' : '' ?>>Juego de preguntas</option>
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
                <input type="text" name="email"  value="<?php echo old('email') ?>">
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
