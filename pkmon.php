<!DOCTYPE html>
<html>
<title>POLI POKEDEX</title>
<head>
  <link rel="icon" type="image/png" href="CSS/images/polipkdexlogo.png">
  <link rel="stylesheet" href="CSS/stypk.css">

<!--por metodo get tenemos el pokemon seleccionado de la tabla del index -->
  <?php
    $pokemon= $_GET['pkmon'];
    $api = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon");
    curl_setopt($api, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($api);
    curl_close($api);

// aqui decodifica el archivo JSON y lo almacena en la variable $json
    $json = json_decode($response);

// este es el condicional que filtra el error en caso que la busqueda no sea exitosa
    if ($response == "Not Found"){
      echo '<p>el pokemon '.$pokemon.' aún no existe</p>';
      exit();
    }
    else {
      $pokemon= $json->id;
    }
  ?>

</head>
<body>
  <div class="cont_glob">

    <div class="encabezado">
      <div class="logo"><img src="CSS/images/polipkdexlogo.png" width="150"></div>
    </div>
      <div>
          <div class="foto_principal">
            <div>
              <?php echo '<img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$pokemon.'.png"'?>
            </div>
          </div>
      </div>
      <div>
        <div  class="pknombre"><?php echo $json->name; ?></div>
        <div><h1>Tipo:  <?php echo $json->types[0]->type->name;?></h1></div>
          <div class="tarjeta_sprite">
            <?php
            echo '<img src="'.$json->sprites->back_default.'" width="200">';
            ?>
          </div>
          <div class="tarjeta_sprite">
            <?php
            echo '<img src="'.$json->sprites->front_default.'" width="200">';
            ?>
          </div>
      </div>
    </div>

    <div class="textos">
      <div class="habilities">
        <?php
          echo '<h2>Habilidades</h2>';
          foreach($json->abilities as $k => $v) {
              echo $v->ability->name.'<br>';
          }

          echo '<h2>Movimientos</h2>';
          foreach($json->moves as $k => $v) {
              echo $v->move->name.'<br>';
          }
         ?>
      </div>
    </div>

  </div>

</body>
</html>
