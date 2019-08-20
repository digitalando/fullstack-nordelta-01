<?php
  require_once 'forms/projectRegisterForm.php';
  require_once 'models/projectModel.php';

  if ($_POST) {
    validateForm();
    if (isValid()) {
      saveProyect($pdo, $_POST);
      //header('location: registro-exitoso.php');
    }
  }

?>
<?php require_once 'partials/head.php' ?>
  <body>
    <?php require_once 'partials/header.php' ?>
    <div class="container">
      <main>
        <div class="register-form">
          <form method="post" action="">

            <div class="row">
              <label> Nombre del proyecto
                <input type="text" name="projectName" value="<?= old('projectName'); ?>">
              </label>
              <?php if ( hasError('projectName') ) : ?>
                <p class="errors"><?= getError('projectName') ?></p>
              <?php endif; ?>
            </div>

            <div class="row">
              <label> Tipo de proyecto
                <select name="projectType">
                  <option value="">Seleccione un tipo</option>
                  <option value="Marketplace" <?= selected(old('projectType'), 'Marketplace'); ?>>Marketplace</option>
                  <option value="Red social" <?= selected(old('projectType'), 'Red social'); ?>>Red social</option>
                  <option value="Juego" <?= selected(old('projectType'), 'Juego'); ?>>Juego</option>
                </select>
              </label>
              <?php if ( hasError('projectType') ) : ?>
                <p class="errors"><?= getError('projectType') ?></p>
              <?php endif; ?>
            </div>

            <div class="row">
              <label> Imagen
                <input type="file" name="projectImage">
              </label>
            </div>

            <div class="row">
              <label> Email
                <input type="text" name="email"  value="<?= old('email'); ?>">
              </label>
              <?php if ( hasError('email') ) : ?>
                <p class="errors"><?= getError('email') ?></p>
              <?php endif; ?>
            </div>

            <div class="row">
              <label> Contraseña
                <input type="password" name="pass" value="">
              </label>
            </div>

            <div class="row">
              <label> Confirme contraseña
                <input type="password" name="repass" value="">
              </label>
              <?php if ( hasError('pass') ) : ?>
                <p class="errors"><?= getError('pass') ?></p>
              <?php endif; ?>
            </div>

            <div class="row">
              <button type="submit">Enviar</button>
            </div>
          </form>
        </div>
      </main>
    </div>
    <?php require_once 'partials/footer.php' ?>
  </body>
</html>
