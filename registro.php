<?php

error_reporting(E_ALL);

ini_set('display_errors', '1');

require "./config/database.php";
session_start();
// Valores por defecto
$institucion = "ninguna";
$estado = 'a';

// Procesar datos enviados por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener valores del formulario
    $cc = $_POST["cc"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);
    $instituto = $_POST["instituto"];
    $estado = $_POST["estado"];

    // Consulta SQL para insertar datos en la tabla
    $sql = "INSERT INTO usuario_dimensiones (num_documento, nombre, apellido, fecha_nacimiento, correo, contraseña, institucion, estado) VALUES ('$cc', '$nombre', '$apellido', '$fecha_nacimiento', '$correo', '$contraseña', '$instituto', '$estado')";

    // Ejecutar la consulta y verificar si fue exitosa
    if (mysqli_query($db, $sql)) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    header('location: Login.php');

    mysqli_close($db);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styleLOG.css">
</head>

<!-- <body>
    <div class="signup-box">
        <h1>Regístrate</h1>
        <h4>Regístrate gratis, solo te tomará unos minutos</h4>
        <form method="post">
            <label>C.C.</label>
            <input type="text" name="cc" placeholder="" required>
            <label>Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" placeholder="" required>

            <label>nombre</label>
            <input type="text" name="nombre" placeholder="" required>
            <label>apellido</label>
            <input type="text" name="apellido" placeholder="" required>
            <label>Correo electrónico</label>
            <input type="email" name="correo" placeholder="" required>
            <label>Contraseña</label>
            <input type="password" name="contraseña" placeholder="" required>
            <label>institución</label>
            <input type="text" name="instituto" placeholder="">

            <input type="hidden" name="estado" id="estado" value="a" required>

            <input type="submit" value="Registrarme">
        </form>
        <p>Al dar click en Regístrarme estás aceptando nuestros</p>
        <a href="#">Términos, Condiciones</a> y <a href="#">Políticas de Privacidad</a>
    </div>
    <p class="para-2">¿Ya tienes una cuenta? <a href="Login.php">Entra aquí</a></p>


</body> -->

<body>
    <div>
      <div class="container0">

      </div>
      <div class="container1" >
      <form class="row g-3 needs-validation position top-em-6" method="post" novalidate>
        <div class="col-5">
          <label for="validationCustom01" class="form-label">Tipo de Documento *</label>
          <select class="form-select" id="validationCustom01"  name="tipo_ipodocumento" required>
            <option selected disabled value="">Elegir...</option>
            <option>Cédula de ciudadanía (CC)</option>
            <option>Tarjeta de identidad (TI)</option>
            <option> cédula de extranjería (CE)</option>
          </select>
          <div class="invalid-feedback">
            Por favor elija un tipo de documento
          </div>
        </div>
        <div class="col-5">
          <label for="validationCustom07" class="form-label" >Numero Documento *</label>
          <input type="text" class="form-control" id="validationCustom07" name="cc" required>
          <div class="invalid-feedback">
            Ingrese el numero de documento
          </div>
        </div>
        <div class="col-5">
          <label for="validationCustom02" class="form-label" >Fecha Nacimiento *</label>
          <input type="date" class="form-control" id="validationCustom02" name="fecha_nacimiento" required>
          <div class="invalid-feedback">
            Ingrese la fecha de nacimiento
          </div>
        </div>
          <div class="col-5">
            <label for="validationCustom03" class="form-label" >Primer Nombre *</label>
            <input type="text" class="form-control" id="validationCustom03" name="nombre" required>
            <div class="invalid-feedback">
              Por favor ingrese su nombre
            </div>
          </div>
          <div class="col-5">
            <label for="validationCustom04" class="form-label" >Apellido *</label>
            <input type="text" class="form-control" id="validationCustom04" name="apellido" required>
            <div class="invalid-feedback">
              Por favor ingrese su apellido
            </div>
          </div>
          <div class="col-5">
            <label for="validationCustom07" class="form-label">Institución</label>
            <input type="text" class="form-control" id="validationCustom07"  name="institucion">
          </div>
          <div class="col-10">
            <label for="validationCustom05" class="form-label" >Correo Electronico *</label>
            <input type="email" class="form-control" id="validationCustom05" name="correo" required>
            <div id="passwordHelpBlock" class="form-text">
              Nunca compartiremos tu correo electrónico con nadie.
            </div>
            <div class="invalid-feedback">
              Por favor ingrese su correo
            </div>
          </div>
          <div class="col-10">
            <label for="validationCustom06" class="form-label">Contraseña *</label>
            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpBlock" name="contraseña" placeholder="********" required>
            <div id="passwordHelpBlock" class="form-text">
              Su contraseña debe tener entre 8 y 20 caracteres.
            </div>
            <div class="invalid-feedback">
              Por favor ingrese su contraseña
            </div>
          </div>
          <div class="col-10">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
              <label class="form-check-label" for="invalidCheck">
                Acepto los <a href="#" class="text-decoration-none">Términos de servicio</a> y la <a href="#" class="text-decoration-none">Política de privacidad</a>.
              </label>
              <div class="invalid-feedback">
                Debe aceptarlo antes de enviarlo.
              </div>
            </div>
          </div>
          <div class="col-10">
            <button class="btn btn-primary col-12" type="submit">Enviar</button>
            <div class=" text-center mt-3" for="">
              o <a href="/Log-in.html" class="text-decoration-none">inicia sesión</a>
            </div>
          </div>
          <div >
            <label type="hidden" name="estado" id="estado" value="a" class="form-label" hidden></label>
          </div>
        </form>
      </div>
      </div>

      <script>
        (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
      </script> 
</body>

</html>