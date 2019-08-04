<?php

abstract class Cuenta {
  protected $cbu;
  protected $balance;
  protected $fechaUltimoMovimiento;

  public function __construct($cbu, $balance = 0) {
    $this->cbu = $cbu;
    $this->balance = $balance;
  }

  public abstract function debitar($monto, $origen);

  public function acreditar(integer $monto) {
    $this->balance += $monto;
    $this->fechaUltimoMovimiento = new Date();
    //date("Y-m-d H:i:s");
  }

  public function setCbu($cbu){
    $this->cbu = $cbu;
  }
  public function getCbu(){
    return $this->cbu;
  }
  public function setBalance($balance){
    $this->balance = $balance;
  }
  public function getBalance(){
    return $this->balance;
  }
  public function setFechaUltimoMovimiento($fechaUltimoMovimiento){
    $this->fechaUltimoMovimiento = $fechaUltimoMovimiento;
  }
  public function getFechaUltimoMovimiento(){
    return $this->fechaUltimoMovimiento;
  }
}
?>
