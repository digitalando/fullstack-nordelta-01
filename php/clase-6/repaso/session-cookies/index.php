<?php
  session_start();
  session_destroy();

  $name = $_POST['name'] ?? '';

  if($name) {
    $_SESSION['name'] = $name;
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      <p>
        <label>
          Nombre:
          <input type="text" name="name" value="<?php echo $name ?>">
        </label>
      </p>
      <p>
        <button type="submit">Enviar</button>
      </p>
    </form>
    <hr>
    <h4>Post</h4>
    <pre><?php echo print_r($_POST, true); ?></pre>
    <hr>
    <h4>Session</h4>
    <pre><?php echo print_r($_SESSION, true); ?></pre>
    <hr>
    <h4>Cookie</h4>
    <pre><?php echo print_r($_COOKIE, true); ?></pre>
  </body>
</html>
