<?php

require 'connect.php';

session_start();

$usuario = $_POST['usuario'];
$pass = $_POST['password'];
$passn = $_POST['passwordn'];

// Primero, verifica si el usuario existe
$q = "SELECT COUNT(*) as contar FROM usuarios WHERE usuario = '$usuario'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if ($array['contar'] > 0) {
    // Comprueba si las contrase���as coinciden
    if ($pass == $passn) {
        // Actualiza la contrase���a del usuario (en texto sin formato)
        $update = "UPDATE usuarios SET password = '$pass' WHERE usuario = '$usuario'";
        $result = mysqli_query($conexion, $update);

        if ($result) {
            echo '<script>
            alert("Se realizó el cambio de contraseña");
                window.history.go(-2);
            </script>';
        } else {
    echo 'Error al actualizar la contraseña: ' . mysqli_error($conexion);

        }
    } else {
        echo '<script>
           alert("Las contraseñas no coinciden");
            window.history.go(-1);
        </script>';
    }
} else {
    echo '<script>
        alert("El usuario no existe"); 
        window.history.go(-1);
    </script>';
}
?>
