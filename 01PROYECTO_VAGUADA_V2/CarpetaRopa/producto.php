<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPLETAR LLAMADA BD</title>
    <link rel="stylesheet" type="text/css" href="../estilos/estilomenufooter.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo2.css">
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
        <div>
            <img src="<?= $imagen_1 ?>" alt="">
        </div>
        
        <?php
            // Conectar a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bdvaguada";

            $conexion = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Obtener el valor del parámetro producto_id
            $producto_id = $_GET['producto_id'];

            // Consultar la base de datos para obtener los detalles del producto
            $sql = "SELECT nombre_producto, descripcion_producto, precio_producto, mujer, hombre, infantil, imagen_1, imagen_2, imagen_3, imagen_4, imagen_5, imagen_6, imagen_7, imagen_8, imagen_9 FROM productos WHERE id = ?";

            // Preparar la consulta
            $stmt = $conexion->prepare($sql);

            // Vincular el parámetro
            $stmt->bind_param("i", $producto_id);

            // Ejecutar la consulta
            $stmt->execute();

            // Vincular las columnas de resultado a variables
            $stmt->bind_result(
                $nombre_producto, 
                $descripcion_producto, 
                $precio_producto, 
                $mujer, 
                $hombre, 
                $infantil, 
                $imagen_1_blob, 
                $imagen_2_blob, 
                $imagen_3_blob, 
                $imagen_4_blob, 
                $imagen_5_blob, 
                $imagen_6_blob, 
                $imagen_7_blob, 
                $imagen_8_blob, 
                $imagen_9_blob
            );

            // Obtener los resultados
            $stmt->fetch();

            // Agrega esta línea para imprimir los datos del blob
            var_dump($imagen_1_blob);

            // Intenta convertir directamente el blob a base64 sin agregar "data:image/jpeg;base64,"
            $imagen_1 = base64_encode($imagen_1_blob);

            // Convertir los blobs a imágenes JPEG
            $imagen_1 = 'data:image/jpg;base64,' . base64_encode($imagen_1_blob);
            $imagen_2 = 'data:image/jpg;base64,' . base64_encode($imagen_2_blob);
            $imagen_3 = 'data:image/jpg;base64,' . base64_encode($imagen_3_blob);
            $imagen_4 = 'data:image/jpg;base64,' . base64_encode($imagen_4_blob);
            $imagen_5 = 'data:image/jpg;base64,' . base64_encode($imagen_5_blob);
            $imagen_6 = 'data:image/jpg;base64,' . base64_encode($imagen_6_blob);
            $imagen_7 = 'data:image/jpg;base64,' . base64_encode($imagen_7_blob);
            $imagen_8 = 'data:image/jpg;base64,' . base64_encode($imagen_8_blob);
            $imagen_9 = 'data:image/jpg;base64,' . base64_encode($imagen_9_blob);

            // Cerrar la conexión y liberar recursos
            $stmt->close();
            $conexion->close();
        ?>
    </main>
    <footer>
        
    </footer>
</body>
</html>