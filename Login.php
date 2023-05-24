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
    echo "Usuario o contraseña incorrectos";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="./css/Forma.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100&display=swap" rel="stylesheet" />
</head>

<body>
  <div class="login-box">
    <h1>Inicia sesión</h1>
    <form method="post">
      <label for="email">Correo electrónico</label>
      <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" />
      <label for="contraseña">Contraseña</label>
      <input type="password" id="contraseña" name="contraseña" placeholder="Ingresa tu contraseña" />
      <input type="submit" value="Iniciar sesión" />
    </form>
  </div>
  <p class="para-2">
    No tienes una cuenta? <a href="registro.php">Regístrate ahora</a>
  </p>
</body>

</html>