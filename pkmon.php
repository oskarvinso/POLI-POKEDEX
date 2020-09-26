<!DOCTYPE html>
<html>
<title>POLI POKEDEX</title>
<head>
  <link rel="icon" type="image/png" href="CSS/images/polipkdexlogo.png">
  <link rel="stylesheet" href="CSS/estilos.css">
  <?php //trae toda la info de la pokeapi y la almacena en la variable json
    $pokemon= $_GET['pkmon'];
    $api = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon");
    curl_setopt($api, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($api);
    curl_close($api);
    $json = json_decode($response);
  ?>

</head>
<body>
  <div>
    <div class="logo"><img src="CSS/images/polipkdexlogo.png" width="150"></div>
    <div  class="pknombre"><?php echo $json->name; ?></div>
  </div>

  <div class="contenido">
    <div>
          <?php echo '<img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$pokemon.'.png"'?>
    </div>
    <div></div>
  </div>


<?php
  echo '<h2>HABILIDADES</h2>';
  foreach($json->abilities as $k => $v) {
      echo $v->ability->name.'<br>';
  }

  echo '<h2>TIPO</h2>';
  echo $json->types[0]->type->name;

  echo '<h2>FOTOS</h2>';
  echo '<img src="'.$json->sprites->back_default.'" width="200">';
  echo '<img src="'.$json->sprites->front_default.'" width="200">';
 ?>
</body>
</html>
