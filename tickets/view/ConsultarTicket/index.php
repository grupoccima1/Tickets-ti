<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: https://ti.grupoccima.com/index.php");
    exit();
}
require_once("./../../config/conexion.php");
$usuario = $_SESSION['username'];
require_once './../../../php/connect.php';

// Verificar si la sesión está inactiva durante más de 1 minuto
$inactivity_period = 300; // 1 minuto
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactivity_period)) {
    session_unset();
    session_destroy();
    header("Location: https://ti.grupoccima.com/index.php"); // Cambiada la ruta
    exit();
}

$_SESSION['last_activity'] = time();

$consul = "SELECT * FROM `usuarios` WHERE usuario = '$usuario'";
$query = mysqli_query($conexion, $consul);
$mostrar = mysqli_fetch_row($query);
?>

<!DOCTYPE html>
<html>
<?php require_once("../MainHead/head.php");?>
<title>Consultar Ticket</title>
<link rel="stylesheet" href="1.css">
</head>

<body class="with-side-menu">
    <?php require_once("../MainHeader/header.php");?>
    <div class="mobile-menu-left-overlay"></div>
    <?php require_once("../MainNav/nav.php");?>

    <!-- Contenido -->
    <div class="page-content">
        <div class="container-fluid">
            <?php
            switch($mostrar[1]){
                case 'Jimena Alarcon':
                case 'Yaressi Rodriguez':
                    require_once("./../Home/ticketsmaster.php");
                    break;
                default:
                    require_once("./../Home/ticketssuper.php");
                    break;
            }
            ?>
        </div>
    </div>
    <!-- Contenido -->

    <?php require_once("../MainJs/js.php"); ?>
    <!--<script type="text/javascript" src="consultarticket.js"></script>-->

    <script>
        // Cerrar sesión después de 1 minuto de inactividad
        setTimeout(function() {
            window.location.href = 'https://ti.grupoccima.com/index.php';
        }, <?php echo $inactivity_period * 1000; ?>);
    </script>

</body>
</html>
