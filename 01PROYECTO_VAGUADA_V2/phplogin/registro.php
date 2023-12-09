<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
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
</head>
<body>
    <h2>Formulario de Registro</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
        <div style="display: flex;">
            <p>Todos los campos con <span style="color: red;">*</span> son obligatorios</p>
        </div>

        <label for="name"><span style="color: red;">*</span>Nombre:</label>
        <input type="text" name="name" required><br><br>

        <label for="username"><span style="color: red;">*</span>Nombre de Usuario:</label>
        <input type="text" name="username" required><br><br>

        <label for="password"><span style="color: red;">*</span>Contraseña:</label>
        <input type="password" name="password" required><br><br>

        <label for="email"><span style="color: red;">*</span>Correo Electrónico:</label>
        <input type="email" name="email" required><br><br>

        <label for="tlfnumber"><span style="color: red;">*</span>Número de Teléfono:</label>
        <input type="text" name="tlfnumber" required><br><br>

        <input type="submit" name="submit" value="Registrarse">
    </form>

    <?php
    // Conexión a la base de datos
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_de_datos = "bdvaguada";

    $conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        // Recopila los datos del formulario
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $tlfnumber = $_POST['tlfnumber'];

        // Aplicar hash a la contraseña
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO usuarios (name, username, password, email, tlfnumber) VALUES ('$name', '$username', '$hashed_password', '$email', $tlfnumber)";

        if (mysqli_query($conexion, $sql)) {
            echo "Registro exitoso. ¡Gracias por registrarte!";
        } else {
            echo "Error al registrar: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
    ?>


</body>
</html>
