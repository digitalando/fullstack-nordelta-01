<?php
  // file_get_contents() se puede usar con URLs también y es muy útil
  // para trabajar con APIs de manera rápida.
  $jsonPais = file_get_contents('https://restcountries.eu/rest/v2/all');

  $arrayPais = json_decode($jsonPais, true);
?>

<!-- En este ejemplo usamos la información de la API para llenar nuestro
select de paises -->
<select class="" name="">
  <option value="">Elija su país de origen</option>
  <?php foreach ($arrayPais as $pais) : ?>
    <option value="<?php echo $pais["alpha3Code"] ?>"><?php echo $pais['name'] ?></option>
  <?php endforeach  ?>
</select>
