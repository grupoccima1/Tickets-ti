<?php
session_start();
$usuario = $_SESSION['username'];

require_once '../php/connect.php';
$consul = "SELECT area FROM `usuarios` WHERE usuario = '$usuario'";
$query = mysqli_query($conexion,$consul);
$mostrar=mysqli_fetch_row($query);
require_once '../php/connect.php';
$consul = "SELECT area FROM `usuarios` WHERE usuario = '$usuario'";
$query = mysqli_query($conexion,$consul);
$mostrar=mysqli_fetch_row($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/moment.min.js"></script>
    <!--full calendar-->
    <script src="js/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <script src="js/es.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/sti.css">

    <title>Agenda Cima</title>
</head>
<body>
<style>
  .bg-pri{
    background-color: #07282C;
  }
  .mt-100px{
    margin-top:100px
  }
</style>
<header>
 <!-- navegacion -->
 <nav class="navbar navbar-expand-sm bg-pri fixed-top">
      <div class="container-fluid px-5">
        <a class="navbar-brand fs-3 text-white fw-bold" href="#">CCIMAIT</a>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link fw-bold text-white fw-bold" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold text-white" href="#">Quienes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold text-white" href="#">Servicios</a>
          </li>
          <li class="nav-item dropdown">
            <!-- Boton de usuario -->
            <a class="nav-link fw-bold text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              <?php
              if(!isset($usuario)){
                header("location: login.php");
              }else{
                echo "$usuario";             
                echo "";
              }
            ?></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Perfil</a></li>
              <li><a class="dropdown-item" href='php/cerrar_sesion.php'>Salir</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <!-- fin de Navegacion -->
</header>

    <div class="container mt-100px">
        
        <div class="row"> 
            <div class="col"></div>
            <div class="col-6">
              <div class="bg-pri p-2 mb-1">
                <h3 class="text-center text-white"> Ingresa la Fecha para el Mantenimiento</h3>

              </div>
            <div id="calendarioweb"></div></div>
            <div class="col"></div>
        </div>

    </div>
    

    <script>
        $(document).ready(function(){
            $('#calendarioweb').fullCalendar({
                header:{
                    left:   'today,prev,next,Miboton',
                    center: 'title',
                    right:  'month,dayGridMonth,agendaWeek,agendaDay'
            },
                eventLimit: true,
                        Array, default: [],
            hiddenDays: [ 6, 0 ],
                        businessHours: {
  // days of week. an array of zero-based day of week integers (0=Sunday)
  dow: [ 1, 2, 3, 4, 5 ], // Monday - Thursday

  start: '10:00', // a start time (10am in this example)
  end: '18:00', // an end time (6pm in this example)
},
            initialView: 'dayGridMonth',
                validRange: {
                    start: '2022-10-03',
                    end:   '2022-12-20'
            },
            initialView: 'dayGridMonth',
                validRange: {
                    start: '2022-10-03',
                    end:   '2022-12-20'
            },
            dayClick:function(date,jsEvent,view){
                $('#txtFecha').val(date.format());
                $("#modalEventos").modal();
            },
            eventLimit: true, // for all non-agenda views
  views: {
    agenda: {
      eventLimit: 6 // adjust to 6 only for agendaWeek/agendaDay
    }
  },
            

             events:'https://ti.grupoccima.com/calendariousu/eventos.php',

            eventClick:function(calEvent,jsEvent,view){
              //mostrar titulo en h5 
              $('#tituloEvento').html(calEvent.title);
              //mostrar la informacion en los input 
                $('#txtDescripcion').val(calEvent.descripcion);
                $('#txtId').val(calEvent.id);
                $('#txtTitulo').val(calEvent.title);
                $('#txtColor').val(calEvent.color);
                $('#txtArea').val(calEvent.depto);
                $('#txtArea').val(calEvent.depto);

                FechaHora=calEvent.start._i.split(" ");
                $('#txtFecha').val(FechaHora[0]);
                $('#txtHora').val(FechaHora[1]);

                $("#modalEventos").modal();

            }
            
            });
        });


    </script>

 

      <!-- Modal (agregar,modificar,eliminar) -->
<div class="modal fade" id="modalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr class="">
                <td>Id:</td>
                <td><div class="mb-3">
                  <input type="text"
                    class="form-control" name="" id="txtId" aria-describedby="helpId" placeholder="" disabled>
                </div></td>
              </tr>
              <tr class="">
                <td>Fecha:</td>
                <td><div class="mb-3">
                  <input type="text"
                    class="form-control" name="" id="txtFecha" aria-describedby="helpId" placeholder="" disabled>
                </div></td>
              </tr>
              <tr class="">
                <td>Nombre:</td>
                <td><div class="mb-3">
                  <input type="text"
                    class="form-control" name="" id="txtTitulo" aria-describedby="helpId" disabled value="
                    <?php echo $usuario;?>
                    " >
                </div></td>
              </tr>
              <tr class="">
                <td>Area:</td>
                <td>
                <input type="text"
                    class="form-control" name="" id="txtArea" aria-describedby="helpId" disabled value="
                    <?php
                    echo $mostrar['0'];?>
                    ">
                </td>
              </tr>
              <tr class="">
                <td>Hora:</td>
                <td><div class="mb-3">
                  <input type="text"
                    class="form-control" name="" id="txtHora" aria-describedby="helpId" placeholder="la hora sera asignada por el auxiliar en turno" value="" disabled>
                </div></td>
              </tr>
              <tr class="">
                <td>Notas:</td>
                <td><div class="mb-3">
                  <textarea class="form-control" name="" id="txtDescripcion" rows="3" placeholder="si requieres de algun respaldo o servicio adicional colocalo aqui"></textarea>
                </div> </textarea></td>
              </tr>
             <tr class="">
                <td>Color:</td>
                <td><div class="mb-3">
                  <input type="color"
                    class="form-control" name="" id="txtColor">
                </div> </td>
              </tr>
            </tbody>
          </table>
        </div>
 
      </div>
      <div class="modal-footer">
          
      <button type="button" id="btnAgregar" class="btn btn-success">Guardar</button>
      <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>

<script>

var NuevoEvento;

  $('#btnAgregar').click(function(){
   RecolectarDatos();
   EnviarInformacion('agregar',NuevoEvento);
  });
  
  $('#btnEliminar').click(function(){
   RecolectarDatos();
   EnviarInformacion('eliminar',NuevoEvento);
  });

  $('#btnModificar').click(function(){
   RecolectarDatos();
   EnviarInformacion('modificar',NuevoEvento);
  });
  
function RecolectarDatos(){
      NuevoEvento= {
      id:$('#txtId').val(),
      title:$('#txtTitulo').val(),
      start:$('#txtFecha').val()+" "+$('#txtHora').val(),
      color:$('#txtColor').val(),
      descripcion:$('#txtDescripcion').val(),
      textColor:"#ffffff",
      end:$('#txtFecha').val()+" "+$('#txtHora').val(),
      area:$('#txtArea').val(),
      end:$('#txtFecha').val()+" "+$('#txtHora').val(),
      area:$('#txtArea').val()
    };
}

function EnviarInformacion(accion,objEvento){
      $.ajax({
        type:'POST',
        url:'eventos.php?accion='+accion,
        data:objEvento,
        success:function(msg){
          if(msg){
            $('#calendarioweb').fullCalendar('refetchEvents');
            $('#modalEventos').modal('toggle')
          }
        },
        error:function(){
          alert("Algo salio mal");
        }
      });
}

</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
  </script>
</body>

</html>
