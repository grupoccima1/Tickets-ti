<?php
session_start();
require_once 'connect.php';
$usuario = $_SESSION['username'];




$id = $_GET['id'];
$sel="SELECT id_ticket,email, telefono, sucursal,categoria, descripcion, f_cierre  FROM tickets WHERE id_ticket = '$id'";
$res=mysqli_query($conexion,$sel);
$mos = mysqli_fetch_row($res);




?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("../MainHead/head.php");?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1.css">
    <title>Modificar Registro</title>
</head>

<body>
    <?php 
switch($usuario){
	case 'Yaressi Rodriguez':
		case 'Jimena Alarcon':
            ?>
    <center>
        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 p-4 card">
                        <h2>Modificar registro</h2>
                        <form action="edit2.php" method="post">
                            <input type="hidden" class="form-control" name="id" id="id" aria-describedby="emailHelpId"
                                value="<?php echo $mos[0] ?>" required>
                            <div class="mb-3">
                                <label for="" class="form-label">Reasignar</label>
                                <select class="form-select form-select-lg" name="reasignar" id="reasignar">
                                    <option value="Jimena Alarcon">Jimena Alarcón</option>
                                    <option value="Yaressi Rodriguez">Yaressi Rodriguez</option>
                                    <option value="Jose Renovato">Jose Renovato</option>
                                    <option value="Isai Garcia">Isai Garcia</option>
                                    <option value="Diego Dominguez">Diego Dominguez</option>
                                    <option value="Miguel Ornelas">Miguel Ornelas</option>
                                    <option value="Juan Pablo Barcenas">Juan Pablo Barcenas</option>
                                    <option value="Jackelin Yañez">Jackelin Yañez</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Estado</label>
                                <select class="form-select form-select-lg" name="estado" id="estado">
                                    <option value="Abierto">Abierto</option>
                                    <option value="Cerrado">Cerrado</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Fecha de cierre</label>
                                <input type="text" class="form-control" name="fecha" id="fecha"
                                    aria-describedby="helpId" value="<?php echo $mos[6] ?>">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary deletedbt" data-bs-toggle="modal"
                                    data-bs-target="#del">
                                    <a href="https://ti.grupoccima.com/tickets/view/ConsultarTicket/">Cancelar</a>
                                </button>
                                <button type="submit" class="btn  bg-pri editbtn ms-2">
                                    Enviar
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </center>
    <?php
            break;
			case 'jose renovato':?>
    <center>
        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 card">
                        <h2>Modificar registro</h2>
                        <form action="edit1.php" method="post">
                            <input type="hidden" class="form-control" name="id" id="id" aria-describedby="emailHelpId"
                                value="<?php echo $mos[0] ?>" required>
                            <div class="mb-3">
                                <label for="" class="form-label">Reasignar</label>
                                <select class="form-select form-select-lg" name="reasignar" id="reasignar">
                                    <option value="Jose Renovato">Jose Renovato</option>
                                    <option value="Diego Dominguez">Diego Dominguez</option>
                                    <option value="Miguel Ornelas">Miguel Ornelas</option>
                                    <option value="Juan Pablo Barcenas">Juan Pablo Barcenas</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Estado</label>
                                <select class="form-select form-select-lg" name="estado" id="estado">
                                    <option value="Abierto">Abierto</option>
                                    <option value="Cerrado">Cerrado</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary deletedbt" data-bs-toggle="modal"
                                    data-bs-target="#del">
                                    <a href="https://ti.grupoccima.com/tickets/view/ConsultarTicket/">Cancelar</a>
                                </button>
                                <button type="submit" class="btn bg-pri editbtn ms-2">
                                    Enviar
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </center>
    <?php
        break;
        case 'isai garcia':
            ?>
    <center>

        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 card">
                        <h2>Modificar registro</h2>
                        <form action="edit1.php" method="post">
                            <input type="hidden" class="form-control" name="id" id="id" aria-describedby="emailHelpId"
                                value="<?php echo $mos[0] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Estado</label>
                                <select class="form-select form-select-lg" name="estado" id="estado">
                                    <option value="Abierto">Abierto</option>
                                    <option value="Cerrado">Cerrado</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary deletedbt" data-bs-toggle="modal"
                                    data-bs-target="#del">
                                    <a href="https://ti.grupoccima.com/tickets/view/ConsultarTicket/">Cancelar</a>
                                </button>
                                <button type="submit" class="btn bg-pri editbtn ms-2">
                                    Enviar
                                </button>

                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </center>
    <?php
            break;
	default:

	?>
        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 card py-2 px-3">
                        <h2 class="text-center">Modificar registro</h2>
                        <form action="edit.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="id" id="id" aria-describedby="emailHelpId"
                                value="<?php echo $mos[0] ?>" required>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    aria-describedby="emailHelpId" value="<?php echo $mos[1] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    aria-describedby="helpId" value="<?php echo $mos[2] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Sucursal</label>
                                <select class="form-select form-select" name="sucursal" id="sucursal"
                                    value="<?php echo $mos[3] ?>">
                                    <option selected>Select one</option>
                                    <option value="Santa Rosa" <?php if ($mos[3] == 'Santa Rosa') echo 'selected'; ?>>Santa Rosa</option>
                                    <option value="Bernardo Quintana" <?php if ($mos[3] == 'Bernardo Quintana') echo 'selected'; ?>>Bernardo Quintana</option>
                                </select>
                            </div>
                            
                           <?php
// Mapeo de categorías con correcciones ortográficas
$correccionesOrtograficas = array(
    
    "camaras" => "C&aacute;maras",
    "compras" => "Compras",
    "documentacion" => "Documentación",
    "email" => "Email",
    "software" => "Software",
    "equipo" => "Equipo",
    "hardware" => "Hardware",
    "impresora" => "Impresora",
    "red" => "Red",
    "respaldo" => "Respaldo",
    "servidor" => "Servidor",
    "automatizacion industrial" => "Automatización industrial",
    "realidad virtual" => "Realidad virtual"
);



// Realizar la consulta a la base de datos
$selectinven = "SELECT * FROM categorias WHERE 1";
$result = mysqli_query($conexion, $selectinven);
?>

<div class="mb-3">
    <label for="" class="form-label">Categoría</label>
    <select class="form-select form-select" name="categoria" id="categoria" required>
        <option selected>Select one</option>
        <?php
        while ($mostrar = mysqli_fetch_row($result)) {
            // Obtener el nombre de la categoría
            $nombreCategoria = $mostrar[1];
            
            // Verificar si hay una corrección ortográfica para esta categoría
            if (isset($correccionesOrtograficas[$nombreCategoria])) {
                $nombreCorregido = $correccionesOrtograficas[$nombreCategoria];
            } else {
                $nombreCorregido = $nombreCategoria;
            }
        ?>
        <option value="<?php echo $nombreCategoria ?>"> <?php echo $nombreCorregido ?> </option>
        <?php
        }
        ?>
    </select>
</div>
                        <div class="mb-3" id="subcategoria">
                        <select class="form-select form-select" name="subcategoria" id="subcategoria" required>
    <option selected>Select one</option>
    <?php
    $selectinven = "SELECT * FROM categorias WHERE 1";
    $result = mysqli_query($conexion, $selectinven);
    while ($mostrar = mysqli_fetch_row($result)) {
        $selected = ($mostrar[1] == $mos[7]) ? 'selected' : '';
        ?>
        <option value="<?php echo $mostrar[1] ?>" <?php echo $selected ?>><?php echo $mostrar[1] ?></option>
        <?php
    }
    ?>
</select>
                        </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" rows="5"
                                    required value="<?php echo $mos[5] ?>"></input>
                            </div>

                           <div class="mb-3">
    <label for="" class="form-label">Elige tu archivo evidencia</label>
    <input type="file" class="form-control" name="archivo" id="archivo" placeholder=""
        aria-describedby="fileHelpId">
</div>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary deletedbt" data-bs-toggle="modal"
                                    data-bs-target="#del">
                                    <a href="https://ti.grupoccima.com/tickets/view/Home/index.php">Cancelar</a>
                                </button>
                                <button type="submit" class="btn bg-pri editbtn ms-2">
                                    Enviar
                                </button>

                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    <?php
		break;
}
    ?>

    <style>
        .bg-pri {
            background-color: #07282C;
            color: #fff;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#categoria').val(1);
            recargarLista();

            $('#categoria').change(function () {
                recargarLista();
            });
        })
    </script>
    <script type="text/javascript">
        function recargarLista() {
            $.ajax({
                type: "POST",
                url: "datos1.php",
                data: "subcategoria=" + $('#categoria').val(),
                success: function (r) {
                    $('#subcategoria').html(r);
                }
            });
        }
    </script>
    
 <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Selecciona el formulario
        var form = document.querySelector('form');

        // Agrega un manejador de evento al formulario
        form.addEventListener('submit', function (event) {
            // No hay ninguna validación aquí, el formulario se enviará normalmente
        });
    });
</script>


</body>

</html>