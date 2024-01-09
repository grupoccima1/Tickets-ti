<?php

$usuario = $_SESSION['username'];
require_once './../../config/connect.php';

?>
<header class="site-header bg-pri">
    <div class="container-fluid">
        <a class="text-decoration-none" href="./../../../login.php" class="site-logo">
            <!-- Logos de nav -->
            <span class="fs-3 text-white">CCIMA IT</span>
        </a>
        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="d-flex justify-content-end">
                <div class="site-header-shown">
                    <div class="dropdown user-menu">
                    </div>
                </div>
                <!-- boton de usuario -->
                <a class="nav-link fw-bold dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                    <span class="font-icon font-icon-user text-capitalize text-white">
                        <?php echo $usuario; ?>
                </a>
                <ul class="dropdown-menu">
                    <!--<li><a class="dropdown-item" href="#">Perfil</a></li>-->
                    <li><a class="dropdown-item" href="./../../../php/cerrar_sesion.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<style>
    .bg-pri{
        background-color:#07282C;
    }
</style>