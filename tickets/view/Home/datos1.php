<?php
$conexion = mysqli_connect('localhost', 'bbbme11_ti', 'Gccima22.', 'bbbme11_ti1');
$subcategoria = $_POST['subcategoria'];

// Define un array de correcciones ortográficas con códigos ASCII
$correccionesOrtograficas = array(
    "configuracion" => "Configuraci&#243;n",
    "instalacion" => "Instalaci&#243;n",
    "revision" => "Revisi&#243;n",
    "peticion de respaldo" => "Petici&#243;n de respaldo",
    "equipo de red" => "Equipo de red",
    "equipo de computo" => "Equipo de c&oacute;mputo",
    "accesorios de computo" => "Accesorios de c&oacute;mputo",
    "responsiva" => "Responsiva",
    "informe tecnico" => "Informe t&eacute;cnico",
    "politicas y procedimientos" => "Pol&iacute;ticas y procedimientos",
    "manuales" => "Manuales",
    "no envia" => "No env&iacute;a",
    "crear o eliminar" => "Crear o eliminar",
    "cambio de contrasena" => "Cambio de contrase&ntilde;a",
    "rechazo de correo" => "Rechazo de correo",
    "correos no reconocidos" => "Correos no reconocidos",
    "creacion de firmas" => "Creaci&oacute;n de firmas",
    "instalar" => "Instalar",
    "eliminar" => "Eliminar",
    "configurar" => "Configurar",
    "actualizar" => "Actualizar",
    "crear" => "Crear",
    "asignacion" => "Asignaci&oacute;n",
    "resguardo" => "Resguardo",
    "baja" => "Baja",
"cambio de pieza" => "Cambio de pieza",
"diagnostico" => "Diagn&oacute;stico",
"reparacion" => "Reparaci&oacute;n",
"mantenimiento preventivo" => "Mantenimiento preventivo",
"mantenimiento correctivo" => "Mantenimiento correctivo",
"instalar" => "Instalar",
"cambio de impresora" => "Cambio de impresora",
"no imprime" => "No imprime",
"atasco" => "Atasco",
"configuracion" => "Configuraci&oacute;n",
"cableado estructurado" => "Cableado estructurado",
"cambio de red" => "Cambio de red",
"cambio de credenciales de wifi" => "Cambio de credenciales de WiFi",
"internet inestable" => "Internet inestable",
"configuracion" => "Configuraci&oacute;n",
"restaurar respaldo" => "Restaurar respaldo",
"respaldo del equipo" => "Respaldo del equipo",
"no conecta" => "No conecta",
"configuracion" => "Configuraci&oacute;n",
"creacion de usuario" => "Creaci&oacute;n de usuario",
"camaras de vigilancia en parques" => "C&aacute;maras de vigilancia en parques",
"automatizacion plumas" => "Automatizaci&oacute;n plumas",
"diseno de proyecto en espesifico" => "Diseño de proyecto en espec&iacute;fico",
"automatizacion cortinas aluminio" => "Automatizaci&oacute;n cortinas aluminio",
"cotizacion de producto espesifico" => "Cotización de producto espec&iacute;fico",
"aplicacion para oculus" => "Aplicaci&oacute;n para Oculus",
"recorridos virtuales en video" => "Recorridos virtuales en video",
"app para dispositivos moviles" => "App para dispositivos m&oacute;viles",
"recorridos 360 para web" => "Recorridos 360 para web",
"maquetas 3d" => "Maquetas 3D",
"modificacion" => "Modificaci&oacute;n",
"Instalacion en equipo" => "Instalaci&oacute;n en equipo"

);

$sql = "SELECT * from cat where categoria='$subcategoria'";
$result = mysqli_query($conexion, $sql);

$cadena = "<label class='form-label'>Subcategor&iacute;a</label> 
    <select class='form-select form-select' id='subcat' name='subcat' required>";

while ($ver = mysqli_fetch_row($result)) {
    $subcategoria = $ver[2];
    
    // Verificar si hay una corrección ortográfica para esta subcategoría
    if (isset($correccionesOrtograficas[$subcategoria])) {
        $subcategoriaCorregida = $correccionesOrtograficas[$subcategoria];
    } else {
        $subcategoriaCorregida = $subcategoria;
    }

    $cadena = $cadena . '<option value="' . $subcategoria . '">' . $subcategoriaCorregida . '</option>';
}

echo  $cadena."</select>";
?>
