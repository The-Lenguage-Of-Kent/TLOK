<?php
require "./config/database.php";

$query = "SELECT * FROM usuario_dimensiones";
$resultado = $db->query($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_documento = $_POST["num_documento"];

    // Realizar validaciones y procesamiento adicional si es necesario

    if (isset($_POST["nuevo_rol"])) {
        $nuevo_rol = $_POST["nuevo_rol"];

        // Actualizar el rol del usuario en la base de datos
        $query2 = "UPDATE usuario_dimensiones SET roll = '$nuevo_rol' WHERE num_documento = '$num_documento'";

        if ($db->query($query2)) {
            echo '<script>window.location.href = "./tabla.php";</script>';
            exit();
        } else {
            echo "Error al cambiar el rol del usuario: " . mysqli_error($db);
        }
    } else {
        // Eliminar el usuario de la base de datos
        $query = "DELETE FROM usuario_dimensiones WHERE num_documento = '$num_documento'";

        if ($db->query($query)) {
            echo '<script>window.location.href = "./tabla.php";</script>';
            exit();
        } else {
            echo "Error al eliminar el usuario: " . mysqli_error($db);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
    <link rel="icon" href="./images/TROK - JULIAN R.png" type="image/png">
</head>

<body>
    <?php include 'navbar.php'; ?>

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
                            <option value="a" <?php if ($fila['roll'] == 'a') echo 'selected'; ?>>Administrador</option>
                            <option value="i" <?php if ($fila['roll'] == 'i') echo 'selected'; ?>>Intérprete</option>
                            <option value="e" <?php if ($fila['roll'] == 'e') echo 'selected'; ?>>Estudiante</option>
                            <option value="u" <?php if ($fila['roll'] == 'u') echo 'selected'; ?>>Usuario</option>
                        </select>
                        <button type="submit" name="cambiar_rol">Cambiar rol</button>
                    </form>
                </td>
                <td>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="num_documento" value="<?= $fila['num_documento']; ?>">
                        <button type="submit" name="eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>