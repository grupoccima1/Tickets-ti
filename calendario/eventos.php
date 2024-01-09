<?php
   header('Content-Type: application/json');
   $pdo=new PDO("mysql:host=localhost;dbname=bbbme11_sistema","bbbme11_ti","Gccima22.");

   $accion= (isset($_GET['accion']))?$_GET['accion']:'leer';

   switch($accion){
      case 'agregar':
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
         
         break;
      case 'eliminar':
         //instruccion de eliminar  
         $respuesta=false;

         if(isset($_POST['id'])){
            $sentenciaSQL= $pdo->prepare("DELETE FROM eventos WHERE id=:ID");
            $respuesta= $sentenciaSQL->execute(array("ID"=>$_POST['id']));
         }
         echo json_encode($respuesta);
         break;
      case 'modificar':
         //instruccion de modificar
         $sentenciaSQL= $pdo->prepare("UPDATE eventos SET
         title=:title,
         descripcion=:descripcion,
         color=:color,
         textColor=:textColor,
         start=:start,
         end=:end
         WHERE id=:ID");

         $respuesta= $sentenciaSQL->execute(array(
            "ID"=>$_POST['id'],
            "title"=>$_POST['title'],
            "descripcion"=>$_POST['descripcion'],
            "color"=>$_POST['color'],
            "textColor"=>$_POST['textColor'],
            "start"=>$_POST['start'],
            "end"=>$_POST['end']
         ));
         echo json_encode($respuesta);
         break;
      default:
       //seleccionar eventos
         $sentenciaSQL= $pdo->prepare("SELECT * FROM eventos");
         $sentenciaSQL->execute();

         $resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
         echo json_encode($resultado);
      break; 
   }

?>