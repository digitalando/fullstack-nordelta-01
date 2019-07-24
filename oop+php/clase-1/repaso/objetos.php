<?php

/**
 * Clase de usuario
 */
class Usuario
{
  /*
   * @var $nombre string
   */
  private $nombre;
  private $apellido;
  private $email;
  private $password;

  function __construct($nombre, $apellido, $email, $password)
  {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->email = $email;
    $this->setPassword($password);
  }

  function getNombre() {
    return $this->nombre;
  }

  function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  function getApellido() {
    return $this->apellido;
  }

  function setApellido($apellido) {
    $this->apellido = $apellido;
  }

  function getEmail() {
    return $this->email;
  }

  function setEmail($email) {
    $this->email = $email;
  }

  function getPassword() {
    return $this->password;
  }

  function setPassword($password) {
    // Debería chequear si el password ya viene hasheado
    $this->password = $this->hashPassword($password);
  }

  private function hashPassword($password) {
    if ($this->isPasswordHashed($password)) {
        return $password;
    } else {
      return password_hash($password, PASSWORD_DEFAULT);
    }
  }

  function isPasswordHashed($password)
  {
      $nfo = password_get_info($password);
      return $nfo['algo'] != 0;
  }
}

$miUsuario = new Usuario('Miguel', 'López', 'migelopez@dh.com', 'asdasd');

$miUsuario->setPassword('asdasd');

var_dump($miUsuario);

// echo $miUsuario->nombre;
echo $miUsuario->getNombre();

?>
