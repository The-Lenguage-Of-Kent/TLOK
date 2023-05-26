<?php

require "./config/database.php";

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirigir al usuario al formulario de inicio de sesión si no ha iniciado sesión
    header("Location: login.php");
    exit;
}

// Obtener los datos del usuario desde la base de datos
$sql = "SELECT num_documento, nombre, apellido, contraseña, fecha_nacimiento, institucion FROM usuario_dimensiones WHERE correo = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $num_documento = $row["num_documento"];
    $nombre = $row["nombre"];
    $apellido = $row["apellido"];
    $fecha_nacimiento = $row["fecha_nacimiento"];
    $institucion = $row["institucion"];
} else {
    echo "No se encontraron resultados.";
}

// Actualizar los datos de acceso del usuario si se ha enviado el formulario de datos de acceso
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['formDatosAcceso'])) {
    $nuevaContrasena = $_POST["contrasena"];

    // Verificar la contraseña ingresada en el inicio de sesión
    if (password_verify($nuevaContrasena, $row["contraseña"])) {
        // La contraseña es correcta, proceder con la actualización de la contraseña
        echo "La contraseña ingresada ya está en uso. Por favor, elige una contraseña diferente.";
    } else {
        // La contraseña es diferente, proceder con la actualización de la contraseña

        // Codificar la nueva contraseña
        $nuevaContrasenaCodificada = password_hash($nuevaContrasena, PASSWORD_DEFAULT);

        $sql = "UPDATE usuario_dimensiones SET contraseña = ? WHERE correo = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $nuevaContrasenaCodificada, $_SESSION['username']);

        if ($stmt->execute()) {
            echo "Datos de acceso actualizados correctamente."; // Actualizar el valor de la sesión con el nuevo correo
            // Redirigir al usuario a la página de perfil actualizada si los datos se actualizaron con éxito
            header("Location: perfil.php");
            exit;
        } else {
            echo "Error al actualizar los datos de acceso: " . $db->error;
        }
    }
}

// Actualizar los datos personales del usuario si se ha enviado el formulario de datos personales
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['formDatosPersonales'])) {
    $nuevoNombre = $_POST["nombre"];
    $nuevoApellido = $_POST["apellido"];
    $nuevaInstitucion = $_POST["institucion"];

    $sql = "UPDATE usuario_dimensiones SET nombre = ?, apellido = ?, institucion = ? WHERE correo = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssss", $nuevoNombre, $nuevoApellido, $nuevaInstitucion, $_SESSION['username']);

    if ($stmt->execute()) {
        echo "Datos personales actualizados correctamente.";
        // Redirigir al usuario a la página de perfil actualizada si los datos se actualizaron con éxito
        header("Location: perfil.php");
        exit;
    } else {
        echo "Error al actualizar los datos personales: " . $db->error;
    }
}

$db->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="./css/styleROL.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <section>
        <div class="descripcion">
            <div class="separator__content">
                <h3 class="fsize-40">Ajustes y Perfil</h3>
            </div>
            <div class="separator__separator">
                <div class="description">
                    <p class="m-5 fsize-18">Tu información necesaria para poder iniciar sesión en The Language Of Kent, tus datos básicos y tu información de contacto.</p>
                </div>
            </div>
            <div class="access mt-3">
                <h3 class="fsize-30">Datos de acceso</h3>
                <form class="text-center" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="formDatosAcceso" value="true">
                    <div class="row align-items-center mt-3">
                        <div class="col-4 txt-right">
                            <label class="form-label">Correo Electrónico:</label>
                        </div>
                        <div class="col-7">
                            <input type="email" class="form-control" name="correo" value="<?php echo $_SESSION['username']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row align-items-center mt-3">
                        <div class="col-4 txt-right">
                            <label class="form-label">Contraseña:</label>
                        </div>
                        <div class="col-7">
                            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpBlock" name="contrasena" placeholder="**********" required>
                        </div>
                    </div>
                    <div class="col-12 boton-enviar " style="margin-top: 12px;">
                        <button type="submit" class="btn btn-primary col-2">Actualizar</button>
                    </div>
                </form>
            </div>
            <div class="Dpersonales mt-3">
                <h3 class="fsize-30">Datos Personales</h3>
                <form class="text-center" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="formDatosPersonales" value="true">
                    <div class="row align-items-center mt-3">
                        <div class="col-4 txt-right">
                            <label class="form-label">Numero de Documento:</label>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control" name="num_documento" value="<?php echo $num_documento; ?>" readonly>
                        </div>
                    </div>
                    <div class="row align-items-center mt-3">
                        <div class="col-4 txt-right">
                            <label class="form-label">Fecha de Nacimiento:</label>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>" readonly>
                        </div>
                    </div>
                    <div class="row align-items-center mt-3">
                        <div class="col-4 txt-right">
                            <label class="form-label">Nombre:</label>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" required>
                        </div>
                    </div>
                    <div class="row align-items-center mt-3">
                        <div class="col-4 txt-right">
                            <label class="form-label">Apellido:</label>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control" name="apellido" value="<?php echo $apellido; ?>" required>
                        </div>
                    </div>
                    <div class="row align-items-center mt-3">
                        <div class="col-4 txt-right">
                            <label class="form-label">Institución:</label>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control" name="institucion" value="<?php echo $institucion; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 boton-enviar" style="margin-top: 12px;">
                        <button type="submit" class="btn btn-primary col-2">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>