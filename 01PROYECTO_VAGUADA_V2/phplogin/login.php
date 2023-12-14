<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
    <link rel="icon" type="image/x-icon" href="http://drive.google.com/uc?export=view&id=1rOy5lWGsWbryxJL5eWdvYbyMtVnU1Yd0">
    <link rel="stylesheet" type="text/css" href="./loginstyle.css">
</head>
<body class="pruebabodylogin" >
    <h2 id="upp">Inicio de sesión</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
        <div style="display: flex;">
            <p id="upp3">Todos los campos con <span style="color: red;">*</span> son obligatorios</p>
        </div>

        <label id="upp2" for="email"><span style="color: red;">*</span>Correo Electrónico:</label>
        <input type="email" name="email" required><br><br>

        <label id="upp2" for="password"><span style="color: red;">*</span>Contraseña:</label>
        <input type="password" name="password" required><br><br>
    
        <input class="iniciosesionenlace" type="submit" name="submit" value="Iniciar sesión">
        <a href="../index.php">REGRESAR AL MENÚ DE INICIO</a>
    </form>
        
    <?php
if (isset($_POST['submit'])) {
    // Conexión a la base de datos
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_de_datos = "bdvaguada";

    $conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

    // Verificar la conexión a la base de datos
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Obtener datos del formulario
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);

    // Consulta SQL para buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conexion, $sql);

    // Verificar si hay errores en la consulta
    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verificar la contraseña
        if (password_verify($password, $row['password'])) {
            // Inicio de sesión exitoso
            // Almacena la información del usuario en la sesión
            session_start();
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['loggedin'] = true;

            // Redirige a la página correspondiente
            if ($row['id'] == 1) {
                header("Location: ../paginasprincipales/adminropaup.php");
            } else {
                header("Location: ../index.php");
            }
            exit(); // Asegura que el script se detenga después de la redirección
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
}
?>

</body>
</html>