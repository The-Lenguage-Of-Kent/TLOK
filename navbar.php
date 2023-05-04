<?php
session_start();
$loggedin = false;
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  $loggedin = true;
}

if (isset($_POST["logout"])) {
  session_unset();
  session_destroy();
  $loggedin = false;
  header("Location: index.php");
  exit;
}
?>


<div class="navbar navbar-dark bg-dark sticky-xl-top" aria-label="First navbar example">
  <ul class="nav me-auto contact ">
    <li class="nav white px-2"><img src="./images/phone.svg" alt="Telefono" class="phone">+57 3224197273</li>
    <li class="nav white px-2"><img src="./images/mail-3.svg" alt="email" class="mail-3">support@yourmail.com</li>
  </ul>
  <ul class="nav social-media">
    <li class="nav white px-2"><a href="https://twitter.com/"><img src="./images/Twitter.svg" alt="Twitter" class="Twitter"></a></li>
    <l class="nav white px-2"><a href="https://www.whatsapp.com/"><img src="./images/whatsapp.svg" alt="whatsapp" class="Whatsapp"></a></li>
      <li class="nav white px-2"><a href="https://www.facebook.com/"><img src="./images/Facebook.svg" alt="Facebook" class="Facebook"></a></li>
      <li class="nav white px-2"><a href="https://desktop.telegram.org/"><img src="./images/Telegram.svg" alt="Telegram" class="Telegram"></a></li>
      <li class="nav white px-2">│</li>

      <?php if ($loggedin) { ?>
        <li class="nav white link-white">
          <form method="post"><button type="submit" name="logout" class="nav-link px-2">Cerrar Sesión</button></form>
        </li>
      <?php } else { ?>
        <li class="nav white link-white"><a href="./Login.php" class="nav-link px-2">Login</a></li>
        <li class="nav white link-orange"><a href="./registro.php" class="nav-link">Sign up</a></li>
      <?php } ?>
  </ul>

</div>

<header class="py-3 mb-4 border-bottom">
  <div class="container d-flex flex-wrap justify-content-center">
    <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
      <img src="images/TLOK .png" alt="logo" class="logo">
    </a>
    <ul class="nav nav-pills">
      <li class="nav-item nv-i"><a href="./home.php" class="nav-link">Home</a></li>
      <li class="nav-item nv-i"><a href="#Section_2" class="nav-link">Recursos</a></li>
      <li class="nav-item nv-i"><a href="#Section_3" class="nav-link">Comunidad</a></li>
      <li class="nav-item nv-i"><a href="#" class="nav-link">Contacto</a></li>
    </ul>
  </div>
</header>
