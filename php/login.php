
<?php
include 'connect.php';

//Recibir data y almacenarlos

$usuario = $_POST["usuario"];
$pass = $_POST["password"];
//session_start();

//$_SESSION ['usuario'] =$usuario;

$consulta ="SELECT * FROM usuarios WHERE usuario='$usuario' and password = '$pass'";
$result = mysqli_query($conexion, $consulta);

$verification_user = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario != '$usuario'");
if(mysqli_num_rows($verification_user) > 0){
    echo '<script>
    alert("El usuario es incorrecto")
    window.history.go(-1);
    </script>';
    exit;
}


$result = mysqli_query($conexion, $consulta);
if (!$result){
    echo 'Error al iniciar sesion';
} else {
    echo '<script>
        alert("Inicio de sesion correcto")
        window.history.go(-1);
    </script>';
}





mysqli_free_result($result);
mysqli_close($conexion);

?>