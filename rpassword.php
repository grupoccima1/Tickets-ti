<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCIMAIT | Recuperar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fcdf70aeb7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/icons/logo-icon.ico">
</head>
<body class="bg-img">
    <div class="container">
        <div class="row justify-content-center align-content-center h100">
            <!-- Formulario de Recuperacion Contraseña -->
            <div class="col-4 bg-green-trans">
                <div class="mt-3">
                    <h3 class="text-white text-uppercase text-center pb-3">Recuperar contraseña</h3>
                    <form  method="post" action="php/restorepass.php" class="m-3">
                        <div class="mb-3 mt-3">
                            <label for="usuario" class="text-white form-label">Usuario:</label>
                            <input class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario">
                        </div>
                        
                        <div class="mb-3">
                            <label for="pass" class="text-white form-label">Contraseña:</label>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" id="pass" name="password" placeholder="Contraseña nueva">
                                <div class="bg-light p-2 border rounded-end">
                                    <img id="icono" class="w20px" src="img/icons/eye.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="text-white form-label">Repetir contraseña:</label>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password"id="passn" name="passwordn" placeholder="Repite la contraseña">
                                <div class="bg-light p-2 border rounded-end">
                                    <img id="iconon" onclick="passwordVisibility('passn', 'iconon')"  class="w20px" src="img/icons/eye.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center pt-3">
                            <button type="submit" class="btn btn-primary bg-pri px-5">Enviar</button>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <a href="./php/registrou.php" class="text-white text-decoration-none">Registrar </a>
                            <a href="./index.php" class="text-white text-decoration-none">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/main.js"></script>

</body>
</html>