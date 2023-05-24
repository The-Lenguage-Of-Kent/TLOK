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
    $sql = "INSERT INTO usuario_dimensiones (cc, nombre, apellido, fecha_nacimiento, correo, contraseña, institucion, estado) VALUES ('$cc', '$nombre', '$apellido', '$fecha_nacimiento', '$correo', '$contraseña', '$instituto', '$estado')";

    // Ejecutar la consulta y verificar si fue exitosa
    if (mysqli_query($db, $sql)) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    header('Location: Login.php');
    exit();
}

mysqli_close($db);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate</title>
    <link rel="stylesheet" href="./css/Forma.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
</head>

<body>
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


</body>

</html>