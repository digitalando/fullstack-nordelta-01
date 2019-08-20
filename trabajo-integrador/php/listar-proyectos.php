<?php
  require_once 'forms/projectRegisterForm.php';
  require_once 'models/projectModel.php';

  $projects = allProyects($pdo);

?>
<?php require_once 'partials/head.php' ?>
  <body>
    <?php require_once 'partials/header.php' ?>
    <div class="container">
      <main>
        <div class="register-form">
          <?php foreach ($projects as $project) : ?>
            <?php echo print_r($project) ?>
          <?php endforeach; ?>
        </div>
      </main>
    </div>
    <?php require_once 'partials/footer.php' ?>
  </body>
</html>
