<?php
  $pageTitle = "Contacto";
  $bodyClass = "contacto";
?>
<?php include('partials/head.php') ?>
<?php require_once('cosas.php') ?>

<h1>Estamos en contacto</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p><a class="btn btn-big" href="home.php">Volver a la home</a></p>
<p><?= botonHtml('Ir a acerca de', 'acerca-de.php', 'btn-big') ?></p>

<?php include('partials/footer.php') ?>
