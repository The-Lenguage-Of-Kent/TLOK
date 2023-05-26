<?php
require "./config/database.php";

$query = "SELECT * FROM usuario_dimensiones";
$resultado = $db->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLOK</title>
    <link rel="icon" href="./images/TROK - JULIAN R.png" type="image/png">
</head>

<body>



    <?php
    if (isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];

        if ($pagina == 'registro') {
            include './registro.php';
        } elseif ($pagina == 'login') {
            include './Login.php';
        } elseif ($pagina == 'home') {
            include './home.php';
        } else {
            // Comprobar si la página no existe y mostrar el error 404
            if (!file_exists($pagina . '.php')) {
                echo 'Página de error 404 incluida';
                include 'error/404.php';
            } else {
                include $pagina . '.php';
            }
        }
    } else {
        // Página por defecto
        include 'home.php';
    }
    ?>


</body>

</html>