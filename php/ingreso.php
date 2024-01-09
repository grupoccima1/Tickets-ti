<?php
  require 'connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Inventario</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
  </head>
  <body>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId">
        Ingresar datos
      </button>

      <!-- Modal -->
      <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <form action="ag.php" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Ingreso de datos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="" class="form-label">Equipo:</label>
                    <input type="text" class="form-control" name="equipo" id="equipo" aria-describedby="helpId" placeholder="" required>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Responsable:</label>
                    <input type="text" class="form-control" name="responsable" id="responsable" aria-describedby="helpId" placeholder="" required>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Cargo:</label>
                    <input type="text" class="form-control" name="cargo" id="cargo" aria-describedby="helpId" placeholder="" required>
                  </div>       
                  <div class="mb-3">
                    <label for="" class="form-label">Departamento:</label>
                    <input type="text" class="form-control" name="depto" id="depto" aria-describedby="helpId" placeholder="" required>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Sucursal:</label>
                    <select class="form-control" name="sucursal" id="sucursal">
                      <option value="" selected>Select--</option>
                      <option value="Santa rosa">Santa Rosa</option>
                      <option value="Bernardo Quintana">Bernardo Quintana</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Descripcion:</label>
                    <input type="text" class="form-control" name="desc" id="desc" aria-describedby="helpId" placeholder="" required>
                  </div>       
                  <div class="mb-3">
                    <label for="" class="form-label">Marca:</label>
                    <input type="text" class="form-control" name="marca" id="marca" aria-describedby="helpId" placeholder="" required>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Modelo:</label>
                    <input type="text" class="form-control" name="modelo" id="modelo" aria-describedby="helpId" placeholder="" required>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Disco duro:</label>
                    <input type="text" class="form-control" name="disco" id="disco" aria-describedby="helpId" placeholder="" required>
                  </div>        
                  <div class="mb-3">
                    <label for="" class="form-label">Ram:</label>
                    <input type="text" class="form-control" name="ram" id="ram" aria-describedby="helpId" placeholder="" required>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Numero de indentificacion:</label>
                    <input type="text" class="form-control" name="nident" id="nident" aria-describedby="helpId" placeholder="" required>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Procesador:</label>
                    <input type="text" class="form-control" name="proces" id="proces" aria-describedby="helpId" placeholder="" required>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Sistema operativo:</label>
                    <input type="text" class="form-control" name="soper" id="soper" aria-describedby="helpId" placeholder="" required>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Mac:</label>
                    <input type="text" class="form-control" name="mac" id="mac" aria-describedby="helpId" placeholder="" required>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Estatus</label>
                    <select class="form-control" name="estatus" id="estatus">
                      <option value="" selected>Select--</option>
                      <option value="asignado">Asignado</option>
                      <option value="mantenimiento">Mantenimiento</option>
                      <option value="aberiado">Aberiado</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Numero serial:</label>
                    <input type="text" class="form-control" name="nserial" id="nserial" aria-describedby="helpId" placeholder="" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        </form>
      </div>
      
        <table class="table" id="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>equipo</th>
                    <th>responsable</th>
                    <th>cargo</th>
                    <th>departamento</th>
                    <th>sucursal</th>
                    <th>dexripcion</th>
                    <th>marca</th>
                    <th>modelo</th>
                    <th>disco duro</th>
                    <th>ram</th>
                    <th>no. identificacion</th>
                    <th>procesador</th>
                    <th>sistema operativo</th>
                    <th>direccion mac</th>
                    <th>estatus</th>
                    <th>no. serial</th>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>

            <?php
              $selectinven="SELECT * FROM `inventario` WHERE 1";
              $result=mysqli_query($conexion,$selectinven);
              while($mostrar=mysqli_fetch_row($result)){
            ?>
                <tr>
                    <th><?php echo $mostrar['16']; ?></th>
                    <th><?php echo $mostrar['0']; ?></th>
                    <th><?php echo $mostrar['1']; ?></th>
                    <th><?php echo $mostrar['2']; ?></th>
                    <th><?php echo $mostrar['3']; ?></th>
                    <th><?php echo $mostrar['4']; ?></th>
                    <th><?php echo $mostrar['5']; ?></th>
                    <th><?php echo $mostrar['6']; ?></th>
                    <th><?php echo $mostrar['7']; ?></th>
                    <th><?php echo $mostrar['8']; ?></th>
                    <th><?php echo $mostrar['9']; ?></th>
                    <th><?php echo $mostrar['10']; ?></th>
                    <th><?php echo $mostrar['11']; ?></th>
                    <th><?php echo $mostrar['12']; ?></th>
                    <th><?php echo $mostrar['13']; ?></th>
                    <th><?php echo $mostrar['14']; ?></th>
                    <th><?php echo $mostrar['15']; ?></th>
                    <th>
                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId">
                    acciones
                    </button>
                    </th>
                </tr>
                <?php
                  }
                ?>
            </tbody>
        </table>
        

      <script>
        var modelId = document.getElementById('modelId');
      
        modelId.addEventListener('show.bs.modal', function (event) {
              // Button that triggered the modal
              let button = event.relatedTarget;
              // Extract info from data-bs-* attributes
              let recipient = button.getAttribute('data-bs-whatever');
      
            // Use above variables to manipulate the DOM
        });
      </script>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        
    <script>
        var table=document.querySelector("#table");
        var dataTable = new DataTable(table);
    </script>

</body>
</html>