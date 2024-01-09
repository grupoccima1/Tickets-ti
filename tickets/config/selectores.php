<?php
include('./connect.php');
        
        /*    CAMBIO DE ESTADO EN TICKETS     */


        /*  info para grafica de conteo de tickets  */
        $selectinven="select count(*) from tickets where estado='abierto' AND estatus ='activo'";
        $result=mysqli_query($conexion,$selectinven);
        $mostrar=mysqli_fetch_row($result);

        $selectinven1="select count(*) from tickets where estado='vencido' AND estatus ='activo'";
        $result1=mysqli_query($conexion,$selectinven1);
        $vencido=mysqli_fetch_row($result1);

        $selectinven2="select count(*) from tickets where estado='vence hoy' AND estatus ='activo'";
        $result2=mysqli_query($conexion,$selectinven2);
        $mostrar2=mysqli_fetch_row($result2);

        $selectinven3="select count(*) from tickets where estado='sin resolver' AND estatus ='activo'";
        $result3=mysqli_query($conexion,$selectinven3);
        $mostrar3=mysqli_fetch_row($result3);

        $selectinven4="select count(*) from tickets where estado ='en espera' AND estatus ='activo'";
        $result4=mysqli_query($conexion,$selectinven4);
        $mostrar4=mysqli_fetch_row($result4);

        $selectinven5="select count(*) from tickets where estado ='cerrado' AND estatus ='activo'";
        $result5=mysqli_query($conexion,$selectinven5);
        $mostrar5=mysqli_fetch_row($result5);

         $selectinven6="select count(*) from tickets where area = 'navetec' and estado = 'cerrado'";
         $result6=mysqli_query($conexion,$selectinven6);
         $mostrar6=mysqli_fetch_row($result6);
 
         $selectinven7="select count(*) from tickets where area = 'proyectos' and estado = 'cerrado'";
         $result7=mysqli_query($conexion,$selectinven7);
         $mostrar7=mysqli_fetch_row($result7);
 
         $selectinven8="select count(*) from tickets where area = 'desarrollo y construccion' and estado = 'cerrado'";
         $result8=mysqli_query($conexion,$selectinven8);
         $mostrar8=mysqli_fetch_row($result8);
 
         $selectinven9="select count(*) from tickets where area = 'compras' and estado = 'cerrado'";
         $result9=mysqli_query($conexion,$selectinven9);
         $mostrar9=mysqli_fetch_row($result9);
 
         $selectinven10="select count(*) from tickets where area = 'habitta' and estado = 'cerrado'";
         $result10=mysqli_query($conexion,$selectinven10);
         $mostrar10=mysqli_fetch_row($result10);
 
         $selectinven11="select count(*) from tickets where area = 'ti' and estado = 'cerrado'";
         $result11=mysqli_query($conexion,$selectinven11);
         $mostrar11=mysqli_fetch_row($result11);

         $selectinven12="select count(*) from tickets where area = 'administracion' and estado = 'cerrado'";
         $result12=mysqli_query($conexion,$selectinven12);
         $mostrar12=mysqli_fetch_row($result12);
 
         $selectinven13="select count(*) from tickets where area = 'legal' and estado = 'cerrado'";
         $result13=mysqli_query($conexion,$selectinven13);
         $mostrar13=mysqli_fetch_row($result13);
 
         $selectinven14="select count(*) from tickets where area = 'marketing' and estado = 'cerrado'";
         $result14=mysqli_query($conexion,$selectinven14);
         $mostrar14=mysqli_fetch_row($result14);
 
         $selectinven15="select count(*) from tickets where area = 'control y medicion' and estado = 'cerrado'";
         $result15=mysqli_query($conexion,$selectinven15);
         $mostrar15=mysqli_fetch_row($result15);
 
         $selectinven16="select count(*) from tickets where area = 'recursos humanos' and estado = 'cerrado'";
         $result16=mysqli_query($conexion,$selectinven16);
         $mostrar16=mysqli_fetch_row($result16);
 
         $selectinven17="select count(*) from tickets where area = 'rentas' and estado = 'cerrado'";
         $result17=mysqli_query($conexion,$selectinven17);
         $mostrar17=mysqli_fetch_row($result17);


          /*  info para grafica de productividadpor agente  */
          $selectinven18="select count(*) from tickets where agente = 'Jimena Alarcon' and estado = 'cerrado'";
          $result18=mysqli_query($conexion,$selectinven18);
          $mostrar18=mysqli_fetch_row($result18);
  
          $selectinven19="select count(*) from tickets where agente = 'Jose Renovato' and estado = 'cerrado'";
          $result19=mysqli_query($conexion,$selectinven19);
          $mostrar19=mysqli_fetch_row($result19);
  
          $selectinven20="select count(*) from tickets where agente = 'Juan Lira' and estado = 'cerrado'";
          $result20=mysqli_query($conexion,$selectinven20);
          $mostrar20=mysqli_fetch_row($result20);
  
          $selectinven21="select count(*) from tickets where agente = 'Yaressi Rodrigues' and estado = 'cerrado'";
          $result21=mysqli_query($conexion,$selectinven21);
          $mostrar21=mysqli_fetch_row($result21);
  
          $selectinven22="select count(*) from tickets where agente = 'Manuel Olvera' and estado = 'cerrado'";
          $result22=mysqli_query($conexion,$selectinven22);
          $mostrar22=mysqli_fetch_row($result22);
  
          $selectinven23="select count(*) from tickets where agente = 'Alejandro Cabello' and estado = 'cerrado'";
          $result23=mysqli_query($conexion,$selectinven23);
          $mostrar23=mysqli_fetch_row($result23);

?>