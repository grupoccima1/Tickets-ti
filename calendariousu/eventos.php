
<?php
session_start();
$usuario = $_SESSION['username'];
 


 

   header('Content-Type: application/json');
   $pdo = new PDO("mysql:host=localhost;dbname=bbbme11_sistema", "bbbme11_ti", "Gccima22.");

   $accion= (isset($_GET['accion']))?$_GET['accion']:'leer';

   switch($accion){
      case 'agregar':
                $limiteEventosPorDia = 2; // Cambia este valor según el límite deseado

         // Obtener la fecha del evento para contar la cantidad de eventos en ese día
         $fechaEvento = date('Y-m-d', strtotime($_POST['start']));

         $fechaActual = date('Y-m-d');
       
       
        if ($fechaEvento < $fechaActual) {
    echo json_encode(array('error' => 'No puedes agendar un evento en una fecha pasada o en el día actual.'));
} else {
         // Contar la cantidad de eventos para el día seleccionado
         $sentenciaCount = $pdo->prepare("SELECT COUNT(*) as count FROM eventos WHERE DATE(start) = :fechaEvento");
         $sentenciaCount->execute(array('fechaEvento' => $fechaEvento));
         $resultCount = $sentenciaCount->fetch(PDO::FETCH_ASSOC);
         $cantidadEventos = intval($resultCount['count']);
         if ($cantidadEventos >= $limiteEventosPorDia) {
            echo json_encode(array('error' => 'Se ha alcanzado el límite de eventos por día.'));
         } else {
            

         $sentenciaSQL= $pdo->prepare("INSERT INTO eventos (title,descripcion,color,textColor,start,end,depto) 
         VALUES (:title,:descripcion,:color,:textColor,:start,:end,:area)");


         $respuesta=$sentenciaSQL->execute(array(
            "title" =>$_POST['title'],
            "descripcion" =>$_POST['descripcion'],
            "color" =>$_POST['color'],
            "textColor" =>$_POST['textColor'],
            "start" =>$_POST['start'],
            "end" =>$_POST['end'],
            "area" =>$_POST['area'],
            "end" =>$_POST['end'],
            "area" =>$_POST['area']
         ));


             echo json_encode($respuesta);
         }
         
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
     echo json_encode($respuesta);
     break;
  
      default:
       //seleccionar eventos
         $sentenciaSQL= $pdo->prepare("SELECT * FROM eventos WHERE title = '$usuario'");
         $sentenciaSQL->execute();

         $resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
         echo json_encode($resultado);
      break; 
   }


?>