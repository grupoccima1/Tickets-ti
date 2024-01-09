<?php
session_start();
require_once 'connect.php';
$usuario = $_SESSION['username'];

$id = $_GET['id'];

$sel="SELECT * FROM tickets WHERE id_ticket = '$id'";
$res=mysqli_query($conexion,$sel);
$mos = mysqli_fetch_row($res);


$insert = "UPDATE `tickets` SET `estatus`='inactivo' WHERE `id_ticket` = '$id';";

$query = mysqli_query($conexion,$insert);


if ($query) 
{
   
    $_SESSION['mensaje'] = 'Datos eliminados con éxito';
    header("https://ti.grupoccima.com/tickets/view/ConsultarTicket/");
    echo '
    <script>
        setTimeout(function() {
            window.location.href = "https://ti.grupoccima.com/tickets/view/ConsultarTicket/";
        }, 500);
    </script>';
} else {
    $_SESSION['mensaje'] = 'Error en el registro de datos.';
    header("https://ti.grupoccima.com/tickets/view/ConsultarTicket/");
    echo '
    <script>
        setTimeout(function() {
            window.location.href = "https://ti.grupoccima.com/tickets/view/ConsultarTicket/";
        }, 500);
    </script>';
}
?>