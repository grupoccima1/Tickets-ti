    <?php 
session_start();
require_once 'connect.php';
$usuario = $_SESSION['username'];



$categoria = $_POST['categoria'];
$subcategoria = $_POST['subcat'];
$descripcion = $_POST['descripcion'];
$sucursal = $_POST['sucursal'];

$directorio = "add/";
$archivo = '';

if (isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == UPLOAD_ERR_OK) {
    $archivo = $directorio . basename($_FILES["archivo"]["name"]);
    
    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo)) {
        // El archivo se ha subido correctamente.
    } else {
        echo "Hubo un error al subir el archivo.";
        exit(); // Termina el script si hay un error al subir el archivo.
    }
}

switch($categoria){
    case "camaras":
    case "compras":
    case "email":
    case "equipo":
    case "hardware":
    case "impresora":
    case "respaldo":
    case "red":
    case "servidor":
        $mesa = "soporte infraestructura";
    break;
    case "documentacion":
        $mesa = "soporte infraestructura";
    break;
    case "software":
        $mesa = "desarrollo";
    break;
    case "automatizacion industrial":
    case "realidad virtual":
        $mesa = "inovacion";
    break;
}

switch($mesa){
    case "soporte infraestructura":
        $agente = "Yaressi Rodriguez";
    break;
    case "inovacion":
        $agente = "Isai Garcia";
    break;
    case "desarrollo":
        $agente = "jose renovato";
    break;
    case "management":
        $agente = "Jimena Alarcon";
    break;    
}

$fecha_actual = date("Y-m-d");

switch($subcategoria){
    case "configuracion":
    case "instalacion":
    case "revision":
    case "peticion de respaldo":  
    case "informe tecnico":
    case "configurar":
    case "rechazo de correo":
    case "correos no reconocidos":
    case "creacion de firmas":
    case "configurar":
    case "actualizar":
    case "resguardo":
    case "baja":
    case "mantenimeinto preventivo":
    case "mantenimiento correctivo":
    case "instalar en equipo":
    case "cambio de impresora":
    case "configuracion":
    case "cableado estructurado":
    case "restaurar respaldo":
    case "respaldo laptop":        
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 2 days")); 
    break;
    case "creacion de correo":
    case "reemplazo":
    case "diagnostico":
    case "responsiva":
    case "no envia":
    case "crear o eliminar":
    case "cambio de contraseña":
    case "eliminar":
    case "configuracion":
    case "no imprime":
    case "atasco":
    case "Instalacion en equipo":    
    case "cambio de red":
    case "cambio credenciales de wifi":
    case "internet inestable":
    case "configuracion":
    case "no conecta":
    case "creacion de usuario":
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 1 days")); 
    break;    
    case "equipo de red":
    case "equipo de computo":
    case "accesorios de computo":
    case "cambio de pieza":
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 7 days")); 
    break;   
    case "clientes internos":
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 14 days")); 
    break;
    case "crear":
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 100 days")); 
    break;
    case "camaras de vgilancia en parques":
    case "automatizacion plumas":
    case "diseño de proyecto en espesifico":
    case "automatizacion cortinas aluminio":
    case "cotizacion de producto espesifico":
    case "aplicacion para oculus":
    case "recorridos virtuales en video":
    case "app para dispositivos moviles":
    case "recorridos 360 para web":
    case "maquetas 3d":
    case "modiicacion":
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 30 days")); 
    break;          
    case "asignacion":
    case "manuales":
    case "politicas y procedimientos":
    case "diagnostico":        
    case "reparacion":
    case "instalar":
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 3 days")); 
    break;
    default:
    $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 5 days")); 
        break;
           
}


$selectinve="SELECT * FROM usuarios WHERE usuario = '$usuario'";
$resul=mysqli_query($conexion,$selectinve);
$area=mysqli_fetch_row($resul);

$estado = "abierto";
$estatus = "activo";
$insert = "INSERT INTO tickets (usuario,email,telefono,area,descripcion,url,agente,mesa,categoria,subcategoria,t_registro,estado,sucursal,f_cierre,estatus) 
VALUES ('$usuario','$area[4]','$area[3]','$area[6]','$descripcion','$archivo','$agente','$mesa','$categoria','$subcategoria',NOW(),'$estado','$sucursal','$ffinal','$estatus')";

$query = mysqli_query($conexion,$insert);

$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
if ( $query) {

     $_SESSION['mensaje'] = 'Se ha guardado correctamente';
    header("https://ti.grupoccima.com/tickets/view/Home/index.php");
    echo '
    <script>
        setTimeout(function() {
            window.location.href = "https://ti.grupoccima.com/tickets/view/Home/index.php";
        }, 500);
    </script>';
} else {
    $_SESSION['mensaje'] = 'Error en el registro de datos.'. mysqli_error($conexion);
    header("https://ti.grupoccima.com/tickets/view/Home/");
    exit();
    echo '
    <script>
        setTimeout(function() {
            window.location.href = "https://ti.grupoccima.com/tickets/view/Home/";
        }, 500);
    </script>';

}
?>