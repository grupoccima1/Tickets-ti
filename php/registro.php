<?php
include 'connect.php';

//Recibir data y almacenarlos

$nombre = $_POST["nombre"];
$usuario = $_POST["usuario"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$pass = $_POST["password"];
$area = $_POST["area"];

//Consulta para insert
$insert = "INSERT INTO usuarios (nombre, usuario, telefono, correo, password, area) VALUES ('$nombre', '$usuario', '$telefono', '$correo', '$pass', '$area')";

$verification_user = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
if(mysqli_num_rows($verification_user) > 0){
    echo '<script>
    alert("El usuario ya existe")
    window.history.go(-1);
    </script>';
    exit;
}

//Ejecutar la consulta
$result = mysqli_query($conexion, $insert);
if (!$result){
    echo 'Error al registrarse';
} else {
    header('Location: ../index.php');
    exit;
}
//Close conexion
mysqli_close($conexion);
?>
