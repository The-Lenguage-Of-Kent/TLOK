<?php
require "./config/database.php";

$query = "SELECT cc, nombre, apellido, correo, roll FROM usuario_dimensiones";
$resultado = $db->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td>CC</td>
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Correo</td>
            <td>Roll</td>
        </tr>

        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?= $fila['cc']; ?></td>
                <td><?= $fila['nombre']; ?></td>
                <td><?= $fila['apellido']; ?></td>
                <td><?= $fila['correo']; ?></td>
                <td><?= $fila['roll']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>