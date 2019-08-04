<?php
require_once 'Cliente.php';

class Pyme extends Cliente {
  private $razonSocial;
  private $cuit;

  public function __construct($razonSocial,$cuit,$email,$pass){
    $this->razonSocial = $razonSocial;
    $this->cuit = $cuit;
    parent::__construct($email,$pass);
  }

  public function setRazonSocial($razonSocial){
    $this->razonSocial = $razonSocial;
  }
  public function getRazonSocial(){
    return $this->razonSocial;
  }
  public function setCuit($cuit){
    $this->cuit = $cuit;
  }
  public function getCuit(){
    return $this->cuit;
  }
}
?>
