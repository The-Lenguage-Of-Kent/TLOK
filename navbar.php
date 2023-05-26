<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$loggedin = false;

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  $loggedin = true;

  // Aquí debes realizar la conexión a la base de datos y preparar la consulta
  $db = new mysqli('localhost', 'root', '', 'proyect_lok', 3306);

  // Verifica si la conexión a la base de datos fue exitosa
  if ($db->connect_errno) {
    echo "Error al conectar a la base de datos: " . $db->connect_error;
    exit;
  }

  // Prepara la consulta utilizando una sentencia preparada
  $stmt = $db->prepare('SELECT * FROM usuario_dimensiones WHERE correo = ?');

  // Enlaza el valor del correo a la sentencia preparada
  $stmt->bind_param('s', $_SESSION['username']);

  // Ejecuta la consulta
  $stmt->execute();

  // Obtiene el resultado de la consulta
  $result = $stmt->get_result();

  // Verifica si se obtuvo algún resultado
  if ($result->num_rows > 0) {
    // Obtiene la fila de resultados
    $row = $result->fetch_assoc();

    // Asigna el nombre de usuario a $nombre
    $nombre = $row['nombre'];
    $roll = $row['roll'];
  }
}

if (isset($_POST["logout"])) {
  session_unset();
  session_destroy();
  $loggedin = false;
  header("Location: index.php");
  exit;
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TLOK</title>
  <link rel="icon" href="./images/TROK - JULIAN R.png" type="image/png">
  <link rel="stylesheet" href="./css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<div class="navbar navbar-dark bg-dark sticky-xl-top" aria-label="First navbar example">
  <ul class="nav me-auto contact ">
    <li class="nav white px-2"><img src="./images/phone.svg" alt="Telefono" class="phone">+57 3224197273</li>
    <li class="nav white px-2"><img src="./images/mail-3.svg" alt="email" class="mail-3">support@yourmail.com</li>
  </ul>
  <ul class="nav social-media">
    <li class="nav white px-2"><a href="https://twitter.com/"><img src="./images/Twitter.svg" alt="Twitter" class="Twitter"></a></li>
    <li class="nav white px-2"><a href="https://www.whatsapp.com/"><img src="./images/whatsapp.svg" alt="whatsapp" class="Whatsapp"></a></li>
    <li class="nav white px-2"><a href="https://www.facebook.com/"><img src="./images/Facebook.svg" alt="Facebook" class="Facebook"></a></li>
    <li class="nav white px-2"><a href="https://desktop.telegram.org/"><img src="./images/Telegram.svg" alt="Telegram" class="Telegram"></a></li>
    <li class="nav white px-2">│</li>

    <?php if ($loggedin) { ?>

      <div class="dropdown cont-navbar white nav">
        <div class="dropdown__trigger fs-14" onmouseover="activarAnimacion()" onmouseout="desactivarAnimacion()">
          <?php if (isset($nombre)) { ?>
            <li class="class=" dropdown__trigger fs-14" onmouseover="activarAnimacion()" onmouseout="desactivarAnimacion()"><?php echo $nombre; ?></li>
          <?php } ?>
        </div>
        <div class=" triangulo">
        </div>
        <div class="dropdown__content" onmouseover="activarAnimacion()" onmouseout="desactivarAnimacion()">
          <ul class="nav nav-pills fs-14 user-scroll">
            <li class="nav-item nv-i"><a href="./perfil.php" class="nav-link">Perfil</a></li>
            <li class="nav-item nv-i"><a href="./mis_modulos.php" class="nav-link">Mis Modulos</a></li>
            <li class="nav-item nv-i"><a href="./modulos.php" class="nav-link">Modulos</a></li>
            <ul class="nav nav-pills fs-14 ">
              <?php if ($roll === 'i' || $roll === 'a') { ?>
                <div class="pseudo-line"></div>
                <li class="nav-item nv-i"><a href="./editar_modulo.php" class="nav-link">Editar Modulos</a></li>
              <?php } ?>

              <?php if ($roll === 'a') { ?>
                <ul class="nav nav-pills fs-14">
                  <div class="pseudo-line"></div>
                  <li class="nav-item nv-i"><a href="./tabla.php" class="nav-link">Dashboard</a></li>
                </ul>
              <?php } ?>


              <ul class="nav nav-pills fs-14">
                <div class="pseudo-line"></div>
                <li class="nav-item nv-i">
                  <form method="post"><button type="submit" name="logout" class="nav-link">Cerrar Sesión</button></form>
                </li>
              </ul>
            </ul>
          </ul>
        </div>
      </div>

    <?php } else { ?>
      <li class="nav white link-white"><a href="./Login.php" class="nav-link px-2">Login</a></li>
      <li class="nav white link-orange"><a href="./registro.php" class="nav-link">Sign up</a></li>
    <?php } ?>
  </ul>
</div>

<script>
  function activarAnimacion() {
    var contenedor = document.querySelector('.cont-navbar');
    contenedor.classList.add('animacion');
  }

  function desactivarAnimacion() {
    var contenedor = document.querySelector('.cont-navbar');
    contenedor.classList.remove('animacion');
  }
</script>