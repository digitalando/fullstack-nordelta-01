<?php

  // Helpers
  // Funciones generales de que nos asisten en alguna tarea y son reutilizables.

  // Retorna el anterior valor del campo en caso de que exista.
  function old($field) {
    if (isset($_POST[$field])) {
      return $_POST[$field];
    }
  }


  // Valida el formulario y devuelve sus errores en caso de haberlos.
  function validateUserForm($data, $files) {
    // Arrancamos con el array de errores vacío y lo llenamos a medida que los
    // encontremos.
    $errors = [];

    // Nos aseguramos de que las claves existan en $data.
    $projectName = isset($data['projectName']) ? $data['projectName'] : "";
    $projectType = isset($data['projectType']) ? $data['projectType'] : "";
    $projectImage = isset($files['projectImage']) ? $files['projectImage'] : "";
    $email = isset($data['email']) ? $data['email'] : "";
    $pass = isset($data['pass']) ? $data['pass'] : "";
    $repass = isset($data['repass']) ? $data['repass'] : "";

    // Validaciones:
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

    return $errors;
  }

  // Crea el array de usuario
  function createUser($data) {
    // Sanitización:
    // Antes de guardar los datos, tenemos que asegurarnos de limpiarlos
    // quitando cualquier elemento innesesario y encriptando datos sensibles
    // como las contraseñas.

    // Vamos a armar nuestro usuario en un array nuevo, ya que $_POST puede
    // contener elementos innesesarios.

    // Comenzamos con los datos que van directo.
    $user = [
      'projectName' => $data['projectName'],
      'projectType' => $data['projectType'],
      'email' => $data['email'],
    ];

    // Seguimos por la contraseña que debemos encriptar.
    $user['pass'] = password_hash($data['pass'], PASSWORD_DEFAULT);

    return $user;
  }

  // Sube la imagen y nos devuelve su nuevo nombre.
  function uploadProjectImage($files) {
    $projectImage = isset($files['projectImage']) ? $files['projectImage'] : "";

    // Tomamos los datos originales de la imagen.
    $oldPath = $projectImage["tmp_name"];
    $oldName = $projectImage["name"];
    $extension = pathinfo($oldName, PATHINFO_EXTENSION);

    // Formamos el nuevo nombre y el nuevo path a donde quedará guardada.
    $newName = uniqid('project-img-') . "." . $extension;
    $newPath = IMAGE_DIR . $newName;

    // Guardamos la imagen en su path final y la agregamos al array de usuario.
    move_uploaded_file($oldPath, $newPath);

    return $newName;
  }

  // Guarda el usuario en nuestra base de datos y nos devuelve su ID.
  function saveUser($user) {
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

    return $user['id'];
  }
?>
