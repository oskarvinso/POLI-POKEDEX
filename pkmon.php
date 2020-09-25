<!DOCTYPE html>
<html>
<title></title>
<head>
  <?php
    $pokemon= $_GET['pkmon'];
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
  ?>
  
</head>
<body></body>
</html>
