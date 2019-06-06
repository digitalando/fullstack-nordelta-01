<?php
  $jsonPais = file_get_contents('https://restcountries.eu/rest/v2/all');

  $arrayPais = json_decode($jsonPais, true);
?>

<select class="" name="">
  <option value="">Elija su país de origen</option>
  <?php foreach ($arrayPais as $pais) : ?>
    <option value="<?php echo $pais["alpha3Code"] ?>"><?php echo $pais['name'] ?></option>
  <?php endforeach  ?>
</select>
