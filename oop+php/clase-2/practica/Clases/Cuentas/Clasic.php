<?php
  require_once 'Cuenta.php';

  /**
   *
   */
  class Clasic extends Cuenta
  {
    private $origenes = [
      'banelco' => .05,
      'link' => .1,
      'caja' => 0
    ];

    public function debitar($monto, $origen) {
      $this->balance -= $monto + $monto * $this->origenes[$origen];
    }
  }

?>
