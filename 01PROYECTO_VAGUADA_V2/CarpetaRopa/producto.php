<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPLETAR LLAMADA BD</title>
    <link rel="stylesheet" type="text/css" href="../estilos/estilomenufooter.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo2.css">
    <link rel="stylesheet" type="text/css" href="./estiloderopa.css">
</head>
<body>
    <header>
        <?php
            $rutaFoto = "../index.php";
            $ruta = "../CarpetaRopa/ColeccionMujer/mujer.php";
            $ruta1 = "../CarpetaRopa/ColeccionHombre/hombre.php";
            $ruta2 = "../CarpetaRopa/ColecciónNiño/niño.php";
            $ruta3 = "../Informacion001/comollegar.php";
            $ruta4 = "../paginasprincipales/configuser.php";
            $ruta5 = "../phplogin/login.php";
            $ruta6 = "../phplogin/registro.php";
            include("../phpinicio/menu.php");
        ?>
    </header>
    <main>
    <?php

function obtenerProductoPorId() {
    if (isset($_GET['id'])) {
        
        $id = $_GET['id'];

        
        $conexion = new mysqli('localhost', 'root', '', 'bdvaguada');

        
        if ($conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $conexion->connect_error);
        }

        
        $consulta = "SELECT * FROM productos WHERE id = $id";
        $resultado = $conexion->query($consulta);

        
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();

            
            echo "<div class='producto'>";
            $imagenBase64 = base64_encode($fila['imagen_1']);
            echo "<img src='data:image/jpg;base64,{$imagenBase64}' alt='Imagen 1'>";
            echo "<div class='descripcion'>";
            echo "<h1>{$fila['nombre_producto']}</h1>";
            echo "<p>{$fila['descripcion_producto']}</p>";
            echo "<span class='precio'>Precio: {$fila['precio_producto']}</span>";
            $categorias = [];
            if ($fila['infantil']) $categorias[] = 'Niño';
            if ($fila['mujer']) $categorias[] = 'Mujer';
            if ($fila['hombre']) $categorias[] = 'Hombre';
            if (!empty($categorias)) {
                echo "<p>Categoría: " . implode(', ', $categorias) . "</p>";
            }
            echo "</div>";
            echo "</div>";

            for ($i = 2; $i <= 9; $i += 2) {
                $campoImagen1 = "imagen_$i";
                $campoImagen2 = "imagen_" . ($i + 1);

                if (!empty($fila[$campoImagen1]) || !empty($fila[$campoImagen2])) {
                    echo "<div class='producto2'>";
                    if (!empty($fila[$campoImagen1])) {
                        $imagenBase64_1 = base64_encode($fila[$campoImagen1]);
                        echo "<img src='data:image/jpg;base64,{$imagenBase64_1}' alt='Imagen $i'>";
                    }
                    if (!empty($fila[$campoImagen2])) {
                        $imagenBase64_2 = base64_encode($fila[$campoImagen2]);
                        echo "<img src='data:image/jpg;base64,{$imagenBase64_2}' alt='Imagen " . ($i + 1) . "'>";
                    }
                    echo "</div>";
                }
            }

        } else {
            echo "No se encontró ningún producto con el ID $id";
        }

        $conexion->close();
    } else {
        echo "No se proporcionó un ID en la URL";
    }
}

obtenerProductoPorId();

?>

    </main>
    <footer>

    </footer>
</body>
</html>