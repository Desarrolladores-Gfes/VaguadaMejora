<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
</head>
<body>
    <h2>Inicio de Sesión</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="submit" value="Iniciar Sesión">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Conexión a la base de datos
        $host = "localhost";
        $usuario = "root";
        $contrasena = "";
        $base_de_datos = "bdvaguada";

        $conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

        if (!$conexion) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Consulta SQL para buscar el usuario en la base de datos
        $sql = "SELECT * FROM usuarios WHERE username = '$username'";
        $result = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Verificar la contraseña
            if (password_verify($password, $row['password'])) {
                echo "Inicio de sesión exitoso. Bienvenido, " . $row['username'];
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