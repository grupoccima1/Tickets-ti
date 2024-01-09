
<?php

require 'connect.php';

session_start();

$usuario = $_POST['usuario'];
$pass = $_POST['password'];

$q = "SELECT COUNT(*) as contar FROM usuarios WHERE usuario = '$usuario' and password = '$pass' ";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION['username'] = $usuario;
    header("location: ../login.php");
}else{
    echo '<script>
        alert("Datos incorrectos")
        window.history.go(-1);
    </script>';
}


?>