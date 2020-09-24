<!DOCTYPE html>
<html>
<title>POLI POKEDEX</title>
<head>

<link rel="stylesheet" href="CSS/estilos.css">
<link rel="icon" type="image/png" href="CSS/images/polipkdexlogo.png">

<?php
$pokemon=1;
$a=1;

function creartarjeta($pokemon) {
  $api = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon");
  curl_setopt($api, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($api);
  curl_close($api);

  $json = json_decode($response);

  echo '<h2>HABILIDADES</h2>';
  foreach($json->abilities as $k => $v) {
      echo $v->ability->name.'<br>';
  }

  echo '<h2>TIPO</h2>';
  echo $json->types[0]->type->name;

  echo '<h2>FOTOS</h2>';
  echo '<img src="'.$json->sprites->back_default.'" width="200">';
  echo '<img src="'.$json->sprites->front_default.'" width="200">';

}
function creartarjetita($pokemon) {
  $api = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon");
  curl_setopt($api, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($api);
  curl_close($api);

  $json = json_decode($response);




  echo '<button type="button" class="btn'.$pokemon.'"></button>';
  echo '<style>.btn'.$pokemon.'{background:url('.$json->sprites->front_default.');background-position:center; background-repeat:no-repeat; padding:20px 15px;}</style>';
  //echo '<span>'.$json->name.'</span>';
}
?>
</head>
<body>
<div><img src="CSS/images/polipkdexlogo.png"></div>
<div class="principalDiv">
  <?php
  while ($a <= 30) {
      creartarjetita($a);
      $a=$a+1;
  }
   ?>
</div>


</body>

</html>
