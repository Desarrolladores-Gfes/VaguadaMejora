<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../estilos/estilomenufooter.css">
    <title>Colección Mujer</title>
</head>

<body>
    <header>
        <?php
            $rutaFoto = "../../index.php";
            $ruta = "../../CarpetaRopa/ColeccionMujer/mujer.php";
            $ruta1 = "../../CarpetaRopa/ColeccionHombre/hombre.php";
            $ruta2 = "../../CarpetaRopa/ColecciónNiño/niño.php";
            $ruta3 = "../../Informacion001/comollegar.php";
            include("../../phpinicio/menu.php");
        ?>
    </header>
    <main>
        <style>
            .product-row {
                padding-top: 100px;
                display: flex;
                justify-content: space-around;
                margin-bottom: 20px; /* Añade margen entre las filas */
            }

            .product-box {
                width: 23%; /* Ajusta el ancho de la caja para que haya 4 por fila */
                padding: 10px;
                box-sizing: border-box;
                margin: 10px; /* Añade margen entre las cajas */
                border: 1px solid #ccc; /* Añade un borde para separar visualmente las cajas */
                text-align: center; /* Centra el texto dentro de la caja */
            }

            .product-image {
                max-width: 100%; /* Ajusta el tamaño máximo de la imagen */
                height: auto;
                display: block; /* Centra la imagen dentro de la caja */
                margin: 0 auto; /* Centra la imagen horizontalmente */
            }

            .product-name, .product-price {
                display: block; /* Muestra los nombres y precios en bloques separados */
                margin-top: 5px; /* Añade un espacio entre el nombre y el precio */
                font-weight: bold; /* Hace que el nombre y el precio sean más destacados */
            }
        </style>
        <?php
            // Conexión a la base de datos (reemplaza con tus propios datos)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bdvaguada";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta SQL para obtener productos con columna mujer igual a 1
            $sql = "SELECT * FROM productos WHERE mujer = 1";
            $result = $conn->query($sql);

            $totalProductos = $result->num_rows;

            echo '<div class="product-container">';

            $productosPorFila = 4;
            $contadorProductos = 0;

            while ($row = $result->fetch_assoc()) {
                if ($contadorProductos % $productosPorFila == 0) {
                    echo '<div class="product-row">';
                }

                echo '<div class="product-box">';
                echo '<a class="product-link" href="otra_pagina.php?producto_id=' . $row['id'] . '">';
                
                // Mostrar imagen almacenada como blob
                echo '<img class="product-image" src="data:image/jpg;base64,' . base64_encode($row['imagen_1']) . '" alt="Imagen 1">';
                
                echo '<br>';
                echo '<span class="product-name">' . $row['nombre_producto'] . '</span>';
                echo '<br>';
                echo '<span class="product-price">' . $row['precio_producto'] . '€</span>';
                echo '</a>';
                echo '</div>';

                if ($contadorProductos % $productosPorFila == $productosPorFila - 1 || $contadorProductos == $totalProductos - 1) {
                    echo '</div>'; // Cerrar la fila
                }

                $contadorProductos++;
            }

            echo '</div>';
            $conn->close();
        ?>

    </main>
</body>
<footer class="footercontenedor">
    <?php
        include("../../phpinicio/footer.php");
    ?>
</footer>
</html>