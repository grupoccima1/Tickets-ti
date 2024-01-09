<?php
require_once 'connect.php';
$usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="1.css">
    <title>Tickets</title>
</head>
<body>


    <center>
    <div class="table_res">
    <div class="table-responsive">
        <table class="table bg-tabla">
            <thead class="table">
              <tr>
                <th class="d-none" scope="col">Id</th>
                <th class="bg-pri text-white" scope="col">Usuario</th>
                <th class="d-none" scope="col">Email</th>
                <th class="d-none" scope="col">Teléfono</th>
                <th class="bg-pri text-white" scope="col">Area</th>
                <th class="bg-pri text-white" scope="col">Descripción</th>
                <th class="bg-pri text-white" scope="col">Evidencia</th>
                <th class="d-none" scope="col">Categoría</th>
                <th class="d-none" scope="col">Subcategoría</th>
                <th class="d-none" scope="col">Registro</th>
                <th class="bg-pri text-white" scope="col">Estado</th>
                <th class="d-none" scope="col">Sucursal</th>
                <th class="bg-pri text-white" scope="col">Fecha de cierre</th>
                <th class="bg-pri text-white" scope="col">Modificar</th>
                <th class="bg-pri text-white" scope="col">Eliminar</th>
            </tr>
            </thead>
            <tbody>

                <?php
                        $sel="SELECT * FROM tickets WHERE estatus='activo' AND agente = '$usuario' OR usuario = '$usuario' ";
                        $res=mysqli_query($conexion,$sel);
                        while($mos=mysqli_fetch_row($res)){?>
                        <tr class=""></tr>
                            <td class="d-none"><?php echo $mos[0]; ?></td>
                            <td><?php echo $mos[1]; ?></td>
                            <td class="d-none"><?php echo $mos[2]; ?></td>
                            <td class="d-none"><?php echo $mos[3]; ?></td>
                            <td><?php echo $mos[4]; ?></td>
                            <td><?php echo $mos[5]; ?></td>
                            <td> <a href="<?php echo $mos[6]; ?>" download class="file"> File</td>
                            <td class="d-none"><?php echo $mos[9]; ?></td>
                            <td class="d-none"><?php echo $mos[10]; ?></td>
                            <td class="d-none"><?php echo $mos[11]; ?></td>
                            <td><?php echo $mos[12]; ?></td>
                            <td class="d-none"><?php echo $mos[13]; ?></td>
                            <td><?php echo $mos[14]; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary deletedbt" data-bs-toggle="modal"
                                    data-bs-target="#del">
                                    <?php echo "<a href='modif.php?id=".$mos[0]."'><img src='../../public/img/icons/white/edit.svg'></a>";  ?>
                                </button>
                            </td>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger editbtn">
                                    <?php echo "<a href='elim.php?id=".$mos[0]."'><img src='../../public/img/icons/white/delete.svg'></a>";  ?>
                                </button>
                            </td>
                            </tr>
                            <?php
                            }
                        ?>
            </tbody>
        </table>
    </div>
    </div>
    </center>
    
   <!-- alerta -->
   <div id="alertContainer" class="fixed-bottom">
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-6">
                <?php
        if (isset($_SESSION['mensaje'])) {
            if( $_SESSION['mensaje'] == "Datos guardados con éxito" or $_SESSION['mensaje'] == "Datos editados con éxito" or $_SESSION['mensaje'] == "Datos eliminados con éxito")
            {
                echo '
                <div class="alert bg-base alert-dismissible fade show text-white" role="alert">
                    '.$_SESSION['mensaje'].'
                    <button type="button" class="btn-close bg-secondary" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            else{
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    '.$_SESSION['mensaje'].'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }

           
            unset($_SESSION['mensaje']);
        }
        ?>
                </div>
            </div>
        </div>
        
    </div>
    
<style>
    .bg-pri{
        background-color: #07282C !important;
    }
    .color-base{
        color:#07282C;
    }
    .deletedbt{
        width: 35px;
        border-radius: 50%;
        height: 35px;
        padding: 0;
    }
    .deletedbt img{
        width:1rem
    }
    .editbtn{
        width: 35px;
        border-radius: 50%;
        height: 35px;
        padding: 0;
    }
     .bg-tabla{
            background-color:#D9D9D9;
        }
    .editbtn img{
        width:1rem
    }
        
</style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    

</body>
</html>
