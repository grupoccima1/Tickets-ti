<?php
include('selectores.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.esm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/helpers.esm.min.js"></script>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>productividad por area</title>
</head>
<body>


<div>
    <canvas id="Chart"></canvas>
</div>

<script>
const data = {
  labels: [
    'Navetec',
    'Proyectos',
    'Desarrollo y construccion',
    'Compras',
    'Habitta',
    'Ti',
    'Administracion',
    'Legal',
    'Marketing',
    'Control y medicion',
    'Recursos humanos',
    'Rentas'
  ],
  datasets: [{
    label: 'Productividad por area',
    data: [<?php echo $mostrar6[0]; ?>,<?php echo $mostrar7[0]; ?>,<?php echo $mostrar8[0]; ?>,<?php echo $mostrar9[0]; ?>,<?php echo $mostrar10[0]; ?>,<?php echo $mostrar11[0]; ?>,
    <?php echo $mostrar12[0]; ?>,<?php echo $mostrar13[0]; ?>,<?php echo $mostrar14[0]; ?>,<?php echo $mostrar15[0]; ?>,<?php echo $mostrar16[0]; ?>,<?php echo $mostrar17[0]; ?>],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(30, 205, 86)',
      'rgb(20, 99, 132)',
      'rgb(10, 162, 235)',
      'rgb(60, 100, 86)',
      'rgb(90, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};

const config = {
  type: 'doughnut',
  data: data,
};

</script>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const myChart = new Chart(
    document.getElementById('Chart'),
    config
  );
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>