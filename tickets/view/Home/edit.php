<?php
session_start();
require_once 'connect.php';
$usuario = $_SESSION['username'];

$id = $_POST['id'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$categoria = $_POST['categoria'];
$subcategoria = $_POST['subcat'];
$descripcion = $_POST['descripcion'];
$agente = $_POST['agente'];
$mesa = $_POST['mesa'];
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

// El resto de tu c«Ñdigo contin«âa aqu«¿...



switch($categoria){
    case "camaras":
        case "celular":
            case "compras":
                case "email":
                    case "equipo":
                        case "hardware":
                            case "impresora":
                                case "respaldo":
        $mesa = "soporte";
    break;
    case "documentacion":
        $mesa = "soporte";
    break;
    case "software":
        case "marketing":
        $mesa = "desarrollo";
    break;
    case "red":
        case "servidor":
        $mesa = "infraestructura";
    break;
     case "automatizacion industrial":
    case "realidad virtual":
        $mesa = "inovacion";
    break;
}

switch($mesa){
    case "soporte":
        $agente = "Yaressi Rodriguez";
    break;
    case "infraestructura":
        $agente = "Manuel Olvera";
    break;
    case "desarrollo":
        $agente = "Jose Renovato";
    break;
    case "manager":
        $agente = "Jimena Alarcon";
    break;    
     case "inovacion":
        $agente = "Isai Garcia";
    break;
}

$fecha_actual = date("Y-m-d");

switch($subcategoria){
    case "configuracion":
    case "instalacion":
    case "revision":
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 3 days")); 
    break;
    case "peticion de respaldo":
    case "creacion de correo":
    case "reemplazo":
    case "diagnostico":
    case "responsivas":
    case "informe":
    case "politicas y procedimientos":
    case "no envia":
    case "crear o eliminar":
    case "configurar":
    case "cambio de contraseÃ±a":
    case "rechazo de correo":
    case "correos no reconocidos":
    case "creacion de firmas":
    case "instalar":
    case "eliminar":
    case "configurar":
    case "actualizar":
    case "resguardo":
    case "instalar":
    case "cambio de impresora":
    case "no imprime":
    case "atasco":
    case "configuracion":
    case "cambio wify":
    case "cambio credenciales de wify":
    case "internet inestable":
    case "configuracion":
    case "no conecta":
    case "creacion de usuario":
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 1 days")); 
    break;    
    case "equipo de red":
    case "equipo de computo":
    case "video conferencia":
    case "accesorios":
    case "consumible":
    case "soporte tecnico":
    case "cursos":
    case "equipo de impresion":
    case "proyector":
    case "monitor":
    case "cargador":
    case "electricidad (ups, nobreack)":
    case "insumo mantenimiento":
    case "politicas y procedimientos":
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 5 days")); 
    break;   
    case "manuales":
    case "clientes internos":
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 14 days")); 
    break;
    case "crear":
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 100 days")); 
    break;   
    case "asignacion":
    case "cambio de pieza":
    case "diagnostico":        
    case "reparacion":
    case "mantenimeinto preventivo":
    case "mantenimiento correctivo":
    case "cableado estructurado":
    case "restaurar respaldo":
    case "respaldo laptop":
        $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 2 days")); 
    break;
    default:
    $ffinal = date("Y-m-d",strtotime($fecha_actual."+ 5 days")); 
        break;
}

$insert = "UPDATE tickets SET email='$email',telefono='$telefono',descripcion='$descripcion', url='$archivo',agente='$agente',mesa='$mesa',categoria='$categoria',subcategoria='$subcategoria',sucursal='$sucursal' WHERE id_ticket = '$id'";

$query = mysqli_query($conexion,$insert);

// Verificamos si la actualizaci«Ñn se realiz«Ñ correctamente
if ($query) {
    $_SESSION['mensaje'] = 'Datos editados correctamente';
} else {
    $_SESSION['mensaje'] = 'Error en el registro de datos. Detalles: ' . mysqli_error($conexion);
}

// Redireccionamos a la p«¡gina principal
header("Location: https://ti.grupoccima.com/tickets/view/Home/");
exit();
?>

