<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estiloespeciales.css">
</head>
<body>
    <header>
        
    </header>
    <main>
        
    </main>
    <footer>
        
    </footer>
    <?php
        // Configuración de la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bdvaguada";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta para obtener los datos de la tabla
        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Generar las cajas con foto, nombre, descripción y precio
            while ($row = $result->fetch_assoc()) {
                echo "<div class= ;style='border: 1px solid #ccc; margin: 10px; padding: 10px; float: left;'>";
                echo "<img src='" . $row["url_foto"] . "' alt='Foto'>";
                echo "<p>" . $row["nombre_producto"] . "</p>";
                echo "<p>" . $row["descripcion_producto"] . "</p>";
                echo "<p>" . number_format($row["precio_producto"], 2) . " €</p>";
                echo "</div>";
            }
        } else {
            header("Location: error404.html");
            exit();
        }

        // Cerrar conexión
        $conn->close();
    ?>
</body>
</html>