<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes</title>
    <link rel="stylesheet" type="text/css" href="../estilos/estilomenufooter.css">
    <style>
        
        main {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .general-ajustes {
            margin-top: 8%;
            display: flex;
            width: 90%;
            background-color: #fff;
            border: 1px solid #ccc;
            height: 80vh;
        }

        .divajustes1 {
            padding: 30px;
            background-color: #9d6e4e;
            color: #fff;
            min-width: 150px;
        }

        .divajustes1 ul {
            list-style-type: none;
        }

        .divajustes1 a {
            text-decoration: none;
            color: #fff;
        }

        .divajustes2 {
            padding: 20px;
            flex-grow: 1;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: rgb(144, 77, 1);
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: rgb(81, 43, 0);
        }
    </style>
</head>
<body>
    <header>
        <?php
            $rutaFoto = "../index.php";
            $ruta = "../CarpetaRopa/ColeccionMujer/mujer.php";
            $ruta1 = "../CarpetaRopa/ColeccionHombre/hombre.php";
            $ruta2 = "../CarpetaRopa/ColecciónNiño/niño.php";
            $ruta3 = "../Informacion001/comollegar.php";
            include("../phpinicio/menu.php");
        ?>
    </header>
    <main>
        <div class="general-ajustes">
            <div class="divajustes1" >
                <ul>
                    <li><a href="">MODIFICAR DATOS</a></li>
                    <li><a href="">BOTÓN1</a></li>
                    <li><a href="">BOTÓN1</a></li>
                    <li><a href="">BOTÓN1</a></li>
                    <li><a href="?cerrar_sesion=1">Cerrar sesión</a></li>
                </ul>
            </div>
            <div class="divajustes2">
                <?php
                    

                    // Verificar si se solicita cerrar sesión
                    if (isset($_GET['cerrar_sesion'])) {
                        // Cambiar el booleano a false
                        $_SESSION['loggedin'] = false;
                        
                        // Redirigir a la página de inicio de sesión u otra página
                        header("Location: ../index.php"); // Reemplaza "pagina_de_inicio.php" con la página a la que deseas redirigir
                        exit();
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "bdvaguada";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Error de conexión: " . $conn->connect_error);
                    }

                    $user_id = $_SESSION['user_id'];

                    // Si se envió el formulario, actualizar la base de datos
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Recoger los datos del formulario
                        $name = $_POST['name'];
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $tlfnumber = $_POST['tlfnumber'];

                        // Actualizar la base de datos
                        $sql = "UPDATE usuarios SET name = '$name', username = '$username', email = '$email', tlfnumber = '$tlfnumber' WHERE id = $user_id";
                        $result = $conn->query($sql);

                        if ($result) {
                            echo "Datos actualizados correctamente.";
                        } else {
                            echo "Error al actualizar los datos: " . $conn->error;
                        }
                    }

                    // Consultar la base de datos para obtener los datos del usuario
                    $sql = "SELECT name, username, email, tlfnumber FROM usuarios WHERE id = $user_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

                        $name = $row['name'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $tlfnumber = $row['tlfnumber'];
                    }
                ?>
                <form method="post">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" value="<?php echo $name; ?>"><br>

                    <label for="username">Usuario:</label>
                    <input type="text" name="username" value="<?php echo $username; ?>"><br>

                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="email" value="<?php echo $email; ?>"><br>

                    <label for="tlfnumber">Número de teléfono:</label>
                    <input type="tel" name="tlfnumber" value="<?php echo $tlfnumber; ?>"><br>

                    <input type="submit" value="Actualizar">
                </form>

                <?php
                $conn->close();
                ?>
            </div>
        </div>
    </main>
    <footer>
        <?php
            include("../phpinicio/footer.php");
        ?>
    </footer>
</body>
</html>