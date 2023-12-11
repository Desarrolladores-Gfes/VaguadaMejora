<?php
// producto.php

// Configuración de conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdvaguada";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejar la solicitud de búsqueda si se proporciona el parámetro 'action=buscar' y 'id'
if (isset($_GET['action']) && $_GET['action'] == 'buscar' && isset($_GET['id'])) {
    // Obtén el ID de la solicitud AJAX
    $id = $_GET['id'];

    // Consulta SQL para obtener la fila con el ID proporcionado
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);

    // Verificar si se encontró la fila
    if ($result->num_rows > 0) {
        // Convertir el resultado a un array asociativo y enviarlo como JSON
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        // Enviar una respuesta si no se encuentra la fila
        echo "No se encontró ninguna fila con el ID proporcionado";
    }

    // Terminar el script de PHP después de manejar la solicitud AJAX
    exit();
}

// Agrega el siguiente código para manejar la solicitud de búsqueda de fotos
if (isset($_GET['action']) && $_GET['action'] == 'mostrar_fotos') {
    // Consulta SQL para obtener todas las fotos
    $sql = "SELECT * FROM fotos";
    $result = $conn->query($sql);

    // Verificar si se encontraron fotos
    if ($result->num_rows > 0) {
        // Obtener todas las filas como un array asociativo
        $fotos = $result->fetch_all(MYSQLI_ASSOC);
        
        // Enviar las fotos como JSON
        echo json_encode($fotos);
    } else {
        // Enviar una respuesta si no se encuentran fotos
        echo "No se encontraron fotos en la base de datos";
    }

    // Terminar el script de PHP después de manejar la solicitud AJAX
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Página de Productos</title>
</head>
<body>
    <!-- Agrega este bloque de código donde desees mostrar las fotos -->
    <div id="grid-container"></div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Realiza la solicitud AJAX para obtener las fotos
            $.ajax({
                url: 'producto.php?action=mostrar_fotos',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Construir el grid doble con un ancho del 45%
                    var gridContainer = $('#grid-container');
                    data.forEach(function(foto) {
                        var imageElement = $('<img>').attr('src', foto.url).css('width', '45%');
                        gridContainer.append(imageElement);
                    });
                },
                error: function() {
                    console.log('Error al obtener las fotos');
                }
            });
        });
    </script>
</body>
</html>
