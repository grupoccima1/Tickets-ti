<?php
require_once 'connect.php';

$usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="1.css">
    <script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
    <title>Tickets</title>
</head>
<body>
    <div class="button" align="left">
    <!-- Button trigger modal -->
    <button style="background: #07282C; color:#fff" type="button" class="btn mb-4" data-bs-toggle="modal" data-bs-target="#insert">
        Nuevo Ticket
    </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="./rticket.php" method="post" enctype="multipart/form-data">    
                    <div class="modal-header">
                            <h5 class="modal-title text-center" id="modalTitleId">Nuevo Ticket</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">



        <div class="mb-3">
    <label for="sucursal" class="form-label">Sucursal</label>
    <select class="form-select" name="sucursal" id="sucursal" required>
        <option value="" disabled selected>Elige una sucursal</option>
        <option value="Santa Rosa">Santa Rosa</option>
        <option value="Bernardo Quintana">Bernardo Quintana</option>
    </select>
</div>


<div id="mensajeError" style="color: red;"></div>

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




$selectinven = "SELECT * FROM categorias WHERE 1";
$result = mysqli_query($conexion, $selectinven);
?>

<div class="mb-3" style="position: relative;">
    <label for="" class="form-label">Categoría</label>
    <div style="position: relative;">
        <select class="form-select form-select" name="categoria" id="categoria" required>
            <!-- Opción predeterminada -->
            <option value="" disabled selected style="display:none;">Seleccionar uno</option>

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
        <span id="mensajeCategoria" style="color: black; position: absolute; top: 50%; transform: translateY(-50%); left: 8px; pointer-events: none;">Seleccionar uno</span>
    </div>
</div>

<script>
    // Agregar un mensaje de indicación al principio de la lista después de cargar la página
    var categoriaSelect = document.getElementById('categoria');
    var mensajeCategoria = document.getElementById('mensajeCategoria');
    
    categoriaSelect.addEventListener('change', function() {
        mensajeCategoria.style.display = 'none';
    });

    mensajeCategoria.addEventListener('click', function() {
        categoriaSelect.focus();
    });
</script>


                      <div class="mb-3" id="subcategoria-container" style="position: relative;">
    <label for="" class="form-label">Subcategoría</label>
    <div style="position: relative;">
        <select class="form-select form-select" name="subcategoria" id="subcategoria" required>
            <!-- Opción predeterminada -->
            <option value="" disabled selected style="display:none;">Seleccionar uno</option>
            <!-- Agrega opciones dinámicamente aquí si es necesario -->
        </select>
        <span id="mensajeSubcategoria" style="color: black; position: absolute; top: 50%; transform: translateY(-50%); left: 8px; pointer-events: none; z-index: 1;">Seleccionar uno</span>
    </div>
</div>

<script>
    // Agregar un mensaje de indicación al principio de la lista después de cargar la página
    var subcategoriaSelect = document.getElementById('subcategoria');
    var mensajeSubcategoria = document.getElementById('mensajeSubcategoria');
    
    subcategoriaSelect.addEventListener('change', function() {
        if (subcategoriaSelect.value !== "") {
            mensajeSubcategoria.style.display = 'none';
        } else {
            mensajeSubcategoria.style.display = 'block';
        }
    });

    // Añadimos un evento al cambio de categoría para ocultar el mensaje de subcategoría
    var categoriaSelect = document.getElementById('categoria');
    categoriaSelect.addEventListener('change', function() {
        mensajeSubcategoria.style.display = 'none';
    });

    mensajeSubcategoria.addEventListener('click', function() {
        subcategoriaSelect.focus();
    });
</script>


                        <div class="mb-3">
                            <label for="" class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="5" required placeholder="Detalla con breves palabras el problema que precenta el equipo"></textarea>
                        </div>

                   <div class="mb-3">
    <label for="" class="form-label">Elige tu archivo evidencia</label>
    <input type="file" class="form-control" name="archivo" id="archivo" placeholder=""
        aria-describedby="fileHelpId">
</div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button style="background: #07282C; color:#fff" type="submit" class="btn ">Enviar</button>
                </div>
                    
                </form>
            </div>
        </div>
    </div>


    <!-- insert -->
    <script>
        var modalId = document.getElementById('insert');
    
        modalId.addEventListener('show.bs.modal', function (event) {
              // Button that triggered the modal
                let button = event.relatedTarget;
              // Extract info from data-bs-* attributes
                let recipient = button.getAttribute('data-bs-whatever');
    
            // Use above variables to manipulate the DOM
        });
        
        </script>

    <center>
    <div class="table_res">
    <div class="table-responsive">
        <table class="table bg-tabla">
            <thead class="table">
                <tr>
                    <th class="bg-pri text-white" scope="col">Id</th>
                    <th class="bg-pri text-white" scope="col">Descripción</th>
                    <th class="bg-pri text-white" scope="col">Evidencia</th>
                    <th class="bg-pri text-white" scope="col">Agente</th>
                    <th class="bg-pri text-white" scope="col">Mesa</th>
                    <th class="bg-pri text-white" scope="col">Registro</th>
                    <th class="bg-pri text-white" scope="col">Estado</th>
                    <th class="bg-pri text-white" scope="col">Modificar</th>
                    <th class="bg-pri text-white" scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>

      
            </tbody>     <?php
$sel = "SELECT id_ticket,descripcion,url,agente,mesa,t_registro,estado FROM tickets WHERE usuario = '$usuario' AND estatus = 'activo'";
$res = mysqli_query($conexion, $sel);
while ($mos = mysqli_fetch_row($res)) {
    ?>
    <tr class="">
        <td><?php echo $mos['0']; ?></td>
        <td><?php echo $mos['1']; ?></td>
        <td>
            <?php
            if (!empty($mos['2']) && file_exists($mos['2'])) {
                // Verifica si la URL del archivo no está vacía y si el archivo existe
                echo "<a href=\"$mos[2]\" download class=\"file\">File</a>";
            }
            ?>
        </td>
        <td><?php echo $mos['3']; ?></td>
        <td><?php echo $mos['4']; ?></td>
        <td><?php echo $mos['5']; ?></td>
        <td><?php echo $mos['6']; ?></td>
        <td><!-- Button trigger modal -->
            <button type="button" class="btn btn-primary deletedbt" data-bs-toggle="modal" data-bs-target="#del">
                <?php echo "<a href='modif.php?id=" . $mos[0] . "'><img src='../../public/img/icons/white/edit.svg'></a>"; ?>
            </button>
        </td>
        <td>
            <button type="button" class="btn btn-danger editbtn">
                <?php echo "<a href='elim.php?id=" . $mos[0] . "'><img src='../../public/img/icons/white/delete.svg'></a>"; ?>
            </button>
        </td>
    </tr>
<?php } ?>

        </table>
    </div>
    <!-- alerta -->
   <div id="alertContainer" class="fixed-bottom">
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-6">
                <?php
        if (isset($_SESSION['mensaje'])) {
            if( $_SESSION['mensaje'] == "Se ha guardado correctamente" or $_SESSION['mensaje'] == "Datos editados correctamente" or $_SESSION['mensaje'] == "Datos eliminados con éxito")
            {
                echo '
                <div class="alert bg-pri alert-dismissible fade show text-white" role="alert">
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
    </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
  </script>
<style>
    .bg-pri{
        background-color: #07282C !important;
    }
    .color-base{
        color:#07282C ;
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
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#categoria').val(1);
		recargarLista();

		$('#categoria').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos1.php",
			data:"subcategoria=" + $('#categoria').val(),
			success:function(r){
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


<script>
function verificarSucursal() {
    var sucursalSelect = document.getElementById("sucursal");
    var selectedOption = sucursalSelect.options[sucursalSelect.selectedIndex];

    if (selectedOption.value === "" || selectedOption.value === null) {
        alert("Por favor, seleccione una sucursal antes de enviar el formulario.");
    } else {
        alert("¡Formulario enviado con éxito!");
        // Aquí puedes agregar código para enviar el formulario.
    }
}
</script>

<!--<script>-->
<!--document.addEventListener("DOMContentLoaded", function() {-->
<!--    const selectElement = document.getElementById("sucursal");-->
<!--    selectElement.selectedIndex = -1;-->
<!--});-->
<!--</script>-->
<script>
function validarSeleccion() {
    const selectElement = document.getElementById("sucursal");
    const mensajeError = document.getElementById("mensajeError");

    if (selectElement.value === "") {
        mensajeError.textContent = "Por favor, seleccione una sucursal.";
    } else {
        mensajeError.textContent = ""; // Borra el mensaje de error si se ha seleccionado una opción.
    }
}
</script>



