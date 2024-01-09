<?php
session_start();
require_once 'connect.php';
$usuario = $_SESSION['username'];

$id = $_GET['id'];

$insert = "UPDATE `tickets` SET `estatus`='inactivo' WHERE id_ticket = '$id'";

$query = mysqli_query($conexion,$insert);


if ($query) 
{
     $_SESSION['mensaje'] = 'Se ha Eliminado correctamente.';
    header("https://ti.grupoccima.com/tickets/view/Home/");
    echo '
    <script>
        setTimeout(function() {
            window.location.href = "https://ti.grupoccima.com/tickets/view/Home/";
        }, 500);
    </script>';
} else {
    $_SESSION['mensaje'] = 'Error en el registro de datos.';
    header("https://ti.grupoccima.com/tickets/view/Home/");
    echo '
    <script>
        setTimeout(function() {
            window.location.href = "https://ti.grupoccima.com/tickets/view/Home/";
        }, 500);
    </script>';

}
?>