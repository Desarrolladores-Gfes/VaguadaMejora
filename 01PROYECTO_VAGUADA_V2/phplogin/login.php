<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px; /* Bordes redondeados */
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px; /* Bordes redondeados */
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 5px; /* Bordes redondeados */
        }
    </style>

    <h2>Inicio de sesión</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
        <div style="display: flex;">
            <p>Todos los campos con <span style="color: red;">*</span> son obligatorios</p>
        </div>

        <label for="email"><span style="color: red;">*</span>Correo Electrónico:</label>
        <input type="email" name="email" required><br><br>

        <label for="password"><span style="color: red;">*</span>Contraseña:</label>
        <input type="password" name="password" required><br><br>
    
        <input type="submit" name="submit" value="Iniciar sesión">
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