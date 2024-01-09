<?php
include('selectores.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./../public/css/carts.css">
    <title>graficas y contadores</title>
</head>
<body>
<div class="card-header bg-white">
    <h3 class="card-title">Dashboard</h3>
  </div>
  <div class="container-fluid">
    <div class="row mt-4 ">
      
      <!-- inidicadores -->
      <div class="col-3 ">
        <div class="row p-1 m-1 border bg-gray">
          <div class="col-3 py-3">
            <img src="../../public/img/icons/green/tools-solid.svg" alt="">
          </div>
          <div class="col-9">
            <h5>Abierto</h5>
            <!-- contador de Abierto -->
            <h3 class="text-end"><?php echo $mostrar[0]; ?></h3>
          </div>
        </div>
      </div>
<!-- inidicadores -->
      <div class="col-3 ">
        <div class="row p-1 m-1 border bg-base">
          <div class="col-3 py-3">
            <img src="../../public/img/icons/white/trophy-solid.svg" alt="">
          </div>
          <div class="col-9">
            <h5 class="text-white">Vencido</h5>
            <!-- contador de vencido -->
            <h3 class="text-white text-end"><?php echo $mostrar1[0]; ?></h3>
          </div>
        </div>
      </div>
      <!-- inidicadores -->
      <div class="col-3 ">
        <div class="row p-1 m-1 border bg-gray">
          <div class="col-3 py-3">
            <img src="../../public/img/icons/green/skull-solid.svg" alt="">
          </div>
          <div class="col-9">
            <h5>Vence hoy</h5>
            <!-- Contador de vencen hoy -->
            <h3 class="text-end"><?php echo $mostrar2[0]; ?></h3>
          </div>
        </div>
      </div>
      <!-- inidicadores -->
      <div class="col-3 ">
        <div class="row  p-1 m-1 border bg-base">
          <div class="col-3 py-3">
            <img src="../../public/img/icons/white/skull_danger.svg" alt="">
          </div>
          <div class="col-9">
            <h5 class="text-white"> Sin Resolver</h5>
            <!-- sin Resolver -->
            <h3 class="text-end text-white"><?php echo $mostrar3[0]; ?></h3>
          </div>
        </div>
      </div>
      <!-- inidicadores -->
      <div class="col-3 ">
        <div class="row p-1 m-1 border bg-base">
          <div class="col-3 py-3">
            <img src="../../public/img/icons/white/chart-pie-solid.svg" alt="">
          </div>
          <div class="col-9">
            <h5 class="text-white" >En Espera</h5>
            <!-- en espera -->
            <h3 class="text-end text-white"><?php echo $mostrar4[0]; ?></h3>
          </div>
        </div>
      </div>
      <!-- inidicadores -->
      <div class="col-3">
        <div class="row p-1 m-1 border bg-gray">
          <div class="col-3 py-3">
            <img src="../../public/img/icons/green/chart-area-solid.svg" alt="">
          </div>
          <div class="col-9">
            <h5>Cerrados</h5>
            <!-- Cerrados -->
            <h3 class="text-end"><?php echo $mostrar5[0]; ?></h3>
          </div>
        </div>
      </div>
      
    </div>

    <div class="row mt-5">
      <div class="col-8">
        <h3 class="text-center mb-3">Indicadores Claves</h3>
        <!-- Contenedor de Grafica -->
        <section class="div1">
          <?php
            require_once('count.php');
          ?>
        </section>
      </div>
      <div class="col-4">
        <!-- Lista de Tickets que vence hoy-->
      <h3 class="text-center mb-3">Vence Hoy</h3>
    <?php  if (mysqli_num_rows($r_vencenHoy) > 0) {
    echo "<table>";
    echo "<tr><th>Usuario</th><th>Área</th><th>Descripción</th></tr>";
    while ($fila = mysqli_fetch_assoc($r_vencenHoy)) {
        echo "<tr>";
        echo "<td>" . $fila['usuario'] . "</td>";
        echo "<td>" . $fila['area'] . "</td>";
        echo "<td>" . $fila['descripcion'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron tickets con fecha de cierre para hoy.";
}
?>
      </div>
    </div>
  </div>


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


<style>
  .bg-gray{
    background-color: #D9D9D9;
  }
  .bg-white{
    background-color: #FFF;
  }
  .bg-base{
    background-color: #07282C;
  }
  .color-base{
    color: #07282C;
  }
</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>