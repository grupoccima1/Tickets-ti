
<?php
session_start();
$usuario = $_SESSION['username'];

function obtenerCantidadEventos($fecha, $pdo) {
    $sentenciaSQL = $pdo->prepare("SELECT COUNT(*) as cantidad FROM eventos WHERE start = :fecha");
    $sentenciaSQL->execute(array("fecha" => $fecha));
    $resultados = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
    return $resultados['cantidad'];
}

header('Content-Type: application/json');
$pdo = new PDO("mysql:host=localhost;dbname=bbbme11_sistema", "bbbme11_ti", "Gccima22.");

// Obtener la fecha del POST
$fecha = isset($_GET['start']) ? $_GET['start'] : null;

// Verificar la cantidad de eventos para la fecha específica
$cantidadEventos = obtenerCantidadEventos($fecha, $pdo);

$accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'leer';

switch ($accion) {
    case 'agregar':
        // Verificar la cantidad de eventos existentes para el día
        $consultaEventos = $pdo->prepare("SELECT COUNT(*) as cantidad FROM eventos WHERE start = :start");
        $consultaEventos->execute(array("start" => $_POST['start']));
        $resultados = $consultaEventos->fetch(PDO::FETCH_ASSOC);

        // Limitar a 2 eventos por día
        if ($resultados['cantidad'] >= 2) {
            echo json_encode(["error" => "No se pueden agregar más de 2 eventos por día"]);
        } else {
            // Insertar el nuevo evento
            $sentenciaSQL = $pdo->prepare("INSERT INTO eventos (title, descripcion, color, textColor, start, end, depto) 
                                           VALUES (:title, :descripcion, :color, :textColor, :start, :end, :area)");

            $respuesta = $sentenciaSQL->execute(array(
                "title" => $_POST['title'],
                "descripcion" => $_POST['descripcion'],
                "color" => $_POST['color'],
                "textColor" => $_POST['textColor'],
                "start" => $_POST['start'],
                "end" => $_POST['end'],
                "area" => $_POST['area'],
            ));

            // Devolver la respuesta de la inserción
            echo json_encode(["respuesta" => $respuesta]);
        }

        break;

    case 'modificar':
        // Instrucción para modificar un evento
        $sentenciaSQL = $pdo->prepare("UPDATE eventos SET
     title=:title,
     descripcion=:descripcion,
     color=:color,
     textColor=:textColor,
     start=:start,
     end=:end,
     depto=:area
     WHERE id=:ID");

        $respuesta = $sentenciaSQL->execute(array(
            "ID" => $_POST['id'],
            "title" => $_POST['title'],
            "descripcion" => $_POST['descripcion'],
            "color" => $_POST['color'],
            "textColor" => $_POST['textColor'],
            "start" => $_POST['start'],
            "end" => $_POST['end'],
            "area" => $_POST['area']
        ));

        // Devolver la respuesta de la modificación
        echo json_encode(["respuesta" => $respuesta]);
        break;
       case 'verificar_disponibilidad':
    // Obtener la fecha del POST

$fecha = isset($_GET['start']) ? $_GET['start'] : null;

    // Verificar la cantidad de eventos para la fecha específica
    $cantidadEventos = obtenerCantidadEventos($fecha, $pdo);

    // Devolver la cantidad de eventos en formato JSON
    echo json_encode(["cantidadEventos" => $cantidadEventos]);
    break;


    default:
        //seleccionar eventos
        $sentenciaSQL = $pdo->prepare("SELECT * FROM eventos WHERE title = '$usuario'");
        $sentenciaSQL->execute();

        $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
        break;
}
?>