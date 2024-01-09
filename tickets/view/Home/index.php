<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: https://ti.grupoccima.com/index.php");
    exit();
}
require_once("../../config/conexion.php");


$usuario = $_SESSION['username'];
require_once './../../../php/connect.php';

// Verificar si la sesi«Ñn est«¡ inactiva durante m«¡s de 1 minuto
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
<?php require_once("../MainHead/head.php"); ?>
<title>Panel</title>
<link rel="shortcut icon" type="image/x-icon" href="../../../img/icons/logo-icon.ico">
</head>

<?php

switch ($mostrar[1]) {
    case 'Yaressi Rodriguez':
    case 'Jimena Alarcon':
    case 'Jose Renovato':
    case 'Juan Pablo':
    case 'Jackelin YaÃ±ez':
    case 'Isai Garcia':
?>
        <body class="with-side-menu">
            <?php
            require_once("../MainHeader/header.php");
            ?>
            <div class="mobile-menu-left-overlay"></div>
            <?php
            require_once("../MainNav/nav.php");
            ?>
            <div class="page-content">
                <div class="container-fluid">
                    <?php
                    require_once("./../../config/principalcharts.php");
                    ?>
                </div>
            </div>

            <script>
                // Cerrar sesi«Ñn despu«±s de 1 minuto de inactividad
                setTimeout(function() {
                    window.location.href = 'https://ti.grupoccima.com/index.php';
                }, <?php echo $inactivity_period * 1000; ?>);
            </script>
        </body>
<?php
        break;

    default:
?>
        <body>
            <?php
            require_once("../MainHeader/header.php");
            ?>
            <div class="page-content">
                <div class="container-fluid">
                    <?php
                    require_once("./ticketsusu.php");
                    ?>
                </div>
            </div>

            <script>
                // Cerrar sesi«Ñn despu«±s de 1 minuto de inactividad
                setTimeout(function() {
                    window.location.href = 'https://ti.grupoccima.com/index.php';
                }, <?php echo $inactivity_period * 1000; ?>);
            </script>
        </body>
<?php
        break;
}
?> <!-- Contenido -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>

