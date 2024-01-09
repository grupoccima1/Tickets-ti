<?php

session_start();
require_once 'connect.php';
$usuario = $_SESSION['username'];

$id = $_POST['id'];
$reasignar = $_POST['reasignar'];
$estado = $_POST['estado'];
$fecha = $_POST['fecha'];



switch($reasignar){
    case "Jimena Alarcon":
        $mesa="manager";
        break;
    case "Jose Renovato":
    case "Juan Lira":
        $mesa = "desarrollo";
            break;
    case "Yaressi Rodriguez":
        $mesa = "soporte";
                break;
                case "Manuel Olvera":
                    case "Alejandro Cabello":
                        $mesa = "infraestructura"; 
                    break;
    default:
        $mesa = "soporte";
break;
}

$insert = "UPDATE tickets SET agente='$reasignar',estado='$estado',f_cierre='$fecha',mesa='$mesa' WHERE id_ticket = '$id'";

$query = mysqli_query($conexion,$insert);




if ($query) {
     $_SESSION['mensaje'] = 'Datos editados con éxito';
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

