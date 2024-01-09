<?php
session_start();
require_once 'connect.php';
$usuario = $_SESSION['username'];

$id = $_POST['id'];
$reasignar = $_POST['reasignar'];
$estado = $_POST['estado'];



$insert = "UPDATE tickets SET agente='$reasignar',estado='$estado' WHERE id_ticket = '$id'";

$query = mysqli_query($conexion,$insert);




if ($query) {
    
 $_SESSION['mensaje'] = 'Se ha editado correctamente con éxito.';
    header("https://ti.grupoccima.com/tickets/view/Home/");
    echo '
    <script>
        setTimeout(function() {
            window.history.go(-2);
        }, 500);
    </script>';
} else {
    
 $_SESSION['mensaje'] = 'Error en el registro de datos.';
    header("https://ti.grupoccima.com/tickets/view/Home/");
    echo '
    <script>
        setTimeout(function() {
            window.history.go(-2);
        }, 500);
    </script>';

}
?>