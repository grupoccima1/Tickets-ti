<?php
      require 'connect.php';


    $equipo = $_POST['equipo'];
    $responsable = $_POST['responsable'];
    $cargo = $_POST['cargo'];
    $depto = $_POST['depto'];
    $sucursal = $_POST['sucursal'];
    $desc = $_POST['desc'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $disco = $_POST['disco'];
    $ram = $_POST['ram'];
    $nident = $_POST['nident'];
    $proces = $_POST['proces'];
    $soper = $_POST['soper'];
    $mac = $_POST['mac'];
    $estatus = $_POST['estatus'];
    $nserial = $_POST['nserial'];

    $insert = "INSERT INTO inventario (equipo, responsable, cargo, departamento, sucursal, descripcion, marca, modelo, disco_duro, ram, no_identificacion, procesador, s_operativo, direccion_mac, estatus, no_serial)
    VALUES ('$equipo','$responsable','$cargo','$depto','$sucursal','$desc','$marca','$modelo','$disco','$ram','$nident','$proces','$soper','$mac','$estatus','$nserial')";

    $query = mysqli_query($conexion, $insert);

    if ($query) {
        header("Location: ingreso.php");
    }else {
        echo("error");
    }


?>