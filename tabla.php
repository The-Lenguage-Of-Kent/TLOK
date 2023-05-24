<?php
require "./config/database.php";

$query = "SELECT * FROM usuario_dimensiones";
$resultado = $db->query($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_documento = $_POST["num_documento"];

    // Realizar validaciones y procesamiento adicional si es necesario

    // Eliminar el usuario de la base de datos
    $query = "DELETE FROM usuario_dimensiones WHERE num_documento = '$num_documento'";

    if ($db->query($query)) {
        echo '<script>window.location.href = "./tabla.php";</script>';
        exit();
    } else {
        echo "Error al eliminar el usuario: " . mysqli_error($db);
    }
}
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
            <td>Rol</td>
            <td>Cambio de Rol</td>
            <td>Eliminar Usuario</td>
        </tr>

        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?= $fila['num_documento']; ?></td>
                <td><?= $fila['nombre']; ?></td>
                <td><?= $fila['apellido']; ?></td>
                <td><?= $fila['correo']; ?></td>
                <td><?= $fila['roll']; ?></td>
                <td>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="num_documento" value="<?= $fila['num_documento']; ?>">
                        <select name="nuevo_rol">
                            <option value="a">Administrador</option>
                            <option value="i">Intérprete</option>
                            <option value="e">Estudiante</option>
                            <option value="u">Usuario</option>
                        </select>
                        <button type="submit">Cambiar rol</button>
                    </form>
                </td>
                <td>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="num_documento" value="<?= $fila['num_documento']; ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>