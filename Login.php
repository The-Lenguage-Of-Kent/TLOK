<?php

error_reporting(E_ALL);

ini_set('display_errors', '1');


require "./config/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $correo = $_POST["correo"];
  $contraseña = $_POST['contraseña'];

  $stmt = $db->prepare('SELECT * FROM usuario_dimensiones WHERE correo = ?');
  $stmt->bind_param('s', $correo);
  $stmt->execute();
  $resultado = $stmt->get_result();
  $usuario = $resultado->fetch_assoc();

  if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
    // Las credenciales son correctas, redireccionar al usuario a la página principal o a la página que corresponda
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $usuario['correo'];
    header('Location: index.php');
    exit;
  } else {
    // Las credenciales son incorrectas, mostrar un mensaje de error al usuario
    echo '
  <script>
    alert("El correo o contraseña esta erroneos");
  </script>
';
  }
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
<body>
    <div>
      <div class="container0">

      </div>
      <div class="container1" >
      <form class="row g-3 needs-validation position top-em-15" method="post" novalidate>
          <div class="col-10">
            <label for="validationCustom05" class="form-label">Correo Electronico *</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
            <div class="invalid-feedback">
              Por favor ingrese su correo
            </div>
          </div>
          <div class="col-10">
            <label for="validationCustom06" class="form-label">Contraseña *</label>
            <input type="password" id="contraseña" name="contraseña" placeholder="********" class="form-control" aria-describedby="passwordHelpBlock" required>
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
            <div class=" text-center mt-3">
              <span>

              </span>
              Nuevo? <a href="/SignUp.html" class="text-decoration-none">Crea una Cuenta</a>
            </div>
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