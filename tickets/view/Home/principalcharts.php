<?php
include('selectores.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./../public/css/carts.css">
    <title>graficas y contadores</title>
</head>
<body>

<div class="card-header">
    <h3 class="card-title">Contadores de Estatus</h3>
</div>
<div class="container p-1">
  <div class="row row-cols-0 row-cols-lg-6  g-lg-5">
    <div class="col p-3">
      <div class="p-3 border bg-light">Abierto
        <h5 center><?php echo $mostrar[0]; ?></h5>
      </div>
    </div>
    <div class="col p-3">
      <div class="p-3 border bg-light">Vencido
      <h5 center><?php echo $mostrar1[0]; ?></h5>
      </div>
    </div>
    <div class="col p-3">
      <div class="p-3 border bg-light">Vence hoy
      <h5 center><?php echo $mostrar2[0]; ?></h5>
      </div>
    </div>
    <div class="col p-3">
      <div class="p-3 border bg-light">Sin resolver
      <h5 center><?php echo $mostrar3[0]; ?></h5>
      </div>
    </div>
    <div class="col p-3">
      <div class="p-3 border bg-light">En espera
      <h5 center><?php echo $mostrar4[0]; ?></h5>
      </div>
    </div>
    <div class="col p-3">
      <div class="p-3 border bg-light">Cerrado
      <h5 center><?php echo $mostrar5[0]; ?></h5>
      </div>
    </div>
  </div>
</div>
<br>



<section class="div1">
<?php
require_once('count.php');
?>
</section>



<section class="div1">
<?php
require_once('producagente.php');
?>
</section>

<section class="div1">
<?php
require_once('productarea.php');
?>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>