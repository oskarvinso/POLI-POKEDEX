<!DOCTYPE html>
<html>
<title>POLI POKEDEX</title>
<head>
<link rel="stylesheet" href="CSS/estilos.css">
<link rel="icon" type="image/png" href="CSS/images/polipkdexlogo.png">
</head>
<body>
<div><img src="CSS/images/polipkdexlogo.png"></div>
<div class="principalDiv">
  <?php
  $a=1;
  while ($a <= 100) {
      //carga solo la imagen directamente de la url
      echo '<a href="pkmon.php?pkmon='.$a.'"><img class="btn" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/'.$a.'.png"></a>';
      $a=$a+1;
  }
   ?>
</div>


</body>

</html>
