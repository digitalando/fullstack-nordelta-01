<?php
  require_once 'form.php';

  function validateForm() {
    if ( !checkLength(old('projectName'), 5) ) {
      addError('projectName', 'Debes escribir un nombre de proyecto válido.');
    }

    if ( !checkLength(old('projectType')) ) {
      addError('projectType', 'Debes elegir un tipo de proyecto.');
    }

    if ( !checkEmail(old('email')) ) {
      addError('email', 'Debes escribir un email válido.');
    }

    if ( !checkLength(old('pass'))) {
      addError('pass', 'La contraseña debe tener al menos, 8 caracteres.');
    }

    if ( !checkMatch(old('pass'), old('repass')) ) {
      addError('pass', 'Las contraseñas no coinciden.');
    }
  }
?>
