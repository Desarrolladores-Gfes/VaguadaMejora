<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./estiloespeciales.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilomenufooter.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo2.css">
</head>
<body>
    <header>
        <?php
            $rutaFoto = "../index.php";
            $ruta = "#";
            $ruta1 = "./error404.php";
            $ruta2 = "../CarpetaRopa/ColecciónNiño/niño.php";
            $ruta3 = "../Informacion001/comollegar.php";
            include("../paginasprincipales/menuadmin.php");
        ?>
    </header>
    <main class="maininsertar" >
        <div class="divinsertar" >
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <div>
                    <h3>Requisitos obligatorios <span style="color: red;">*</span></h3>
                </div>

                <div class="textfielduno">
                    <label for="nombre_producto">Nombre del producto:</label>
                    <input type="text" name="nombre_producto" class="form-control" required>
                </div>

                <div class="textfielddos">
                    <label for="descripcion_producto">Descripción del producto:</label>
                    <textarea name="descripcion_producto" class="form-control" rows="4" required></textarea>
                </div>

                <div class="textfieldtres">
                    <label for="precio_producto">Precio del producto:</label>
                    <input type="number" name="precio_producto" class="form-control" step="0.01" required>
                </div>

                <div class="checkbox-container">
                    <label for="mujerCheckbox">Mujer</label>
                    <input type="checkbox" id="mujerCheckbox" name="mujer" value="1" onchange="updateSelection('mujerCheckbox')">
                    
                    <label for="hombreCheckbox">Hombre</label>
                    <input type="checkbox" id="hombreCheckbox" name="hombre" value="1" onchange="updateSelection('hombreCheckbox')">
                    
                    <label for="infantilCheckbox">Infantil</label>
                    <input type="checkbox" id="infantilCheckbox" name="infantil" value="1" onchange="updateSelection('infantilCheckbox')">
                </div>

                <script>
                    function updateSelection(checkboxId) {
                        var checkbox = document.getElementById(checkboxId);
                        var checkboxes = document.getElementsByName(checkbox.name);

                        // Si el checkbox está marcado, establece su valor a 1, de lo contrario, a 0
                        var value = checkbox.checked ? 1 : 0;

                        // Desmarca los demás checkboxes y establece su valor a 0
                        checkboxes.forEach(function(currentCheckbox) {
                            if (currentCheckbox !== checkbox) {
                                currentCheckbox.checked = false;
                                currentCheckbox.value = 0; // Establece el valor a 0 para los demás checkboxes
                            }
                        });

                        // Establece el valor del checkbox actual
                        checkbox.value = value;
                    }
                </script>

                <div class="textfieldcuatro">
                    <label for="imagen_1">Imagen 1:</label>
                    <input type="file" name="imagen_1" class="form-control-file" accept="image/*" required>
                </div>

                <div class="textfieldcinco">
                    <label for="imagen_2">Imagen 2:</label>
                    <input type="file" name="imagen_2" class="form-control-file" accept="image/*" required>
                </div>

                <div class="textfieldseis">
                    <label for="imagen_3">Imagen 3:</label>
                    <input type="file" name="imagen_3" class="form-control-file" accept="image/*">
                </div>

                <div class="textfieldseis">
                    <label for="imagen_4">Imagen 4:</label>
                    <input type="file" name="imagen_4" class="form-control-file" accept="image/*">
                </div>

                <div class="textfieldseis">
                    <label for="imagen_5">Imagen 5:</label>
                    <input type="file" name="imagen_5" class="form-control-file" accept="image/*">
                </div>

                <div class="textfieldseis">
                    <label for="imagen_6">Imagen 6:</label>
                    <input type="file" name="imagen_6" class="form-control-file" accept="image/*">
                </div>

                <div class="textfieldseis">
                    <label for="imagen_7">Imagen 7:</label>
                    <input type="file" name="imagen_7" class="form-control-file" accept="image/*">
                </div>

                <div class="textfieldseis">
                    <label for="imagen_8">Imagen 8:</label>
                    <input type="file" name="imagen_8" class="form-control-file" accept="image/*">
                </div>

                <div class="textfieldsiete">
                    <input type="submit" value="Enviar" class="btn btn-primary">
                </div>
            </form>
        </div>

        <?php
            $host = "localhost";
            $usuario = "root";
            $contrasena = "";
            $base_datos = "bdvaguada";

            $conn = new mysqli($host, $usuario, $contrasena, $base_datos);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre_producto = $_POST["nombre_producto"];
                $descripcion_producto = $_POST["descripcion_producto"];
                $precio_producto = $_POST["precio_producto"];
                $seleccion_mujer = isset($_POST["mujer"]) ? 1 : 0;
                $seleccion_hombre = isset($_POST["hombre"]) ? 1 : 0;
                $seleccion_infantil = isset($_POST["infantil"]) ? 1 : 0;


                // Preparar la consulta SQL para insertar datos del producto
                $query = "INSERT INTO productos (nombre_producto, descripcion_producto, precio_producto, mujer, hombre, infantil) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssdiii", $nombre_producto, $descripcion_producto, $precio_producto, $seleccion_mujer, $seleccion_hombre, $seleccion_infantil);

                // Ejecutar la consulta SQL para insertar datos del producto
                if ($stmt->execute()) {
                    // Obtener el ID del producto recién insertado
                    $producto_id = $stmt->insert_id;

                    // Preparar la consulta SQL para insertar imágenes como BLOB
                    $imagen_campos = ["imagen_1", "imagen_2", "imagen_3", "imagen_4", "imagen_5", "imagen_6", "imagen_7", "imagen_8"];

                    foreach ($imagen_campos as $campo) {
                        if (isset($_FILES[$campo]) && $_FILES[$campo]["error"] == 0 && !empty($_FILES[$campo]["tmp_name"])) {
                            $imagen_temporal = $_FILES[$campo]["tmp_name"];
                            $imagen_contenido = file_get_contents($imagen_temporal);

                            // Insertar la imagen como BLOB
                            $query_imagen = "UPDATE productos SET $campo = ? WHERE id = ?";
                            $stmt_imagen = $conn->prepare($query_imagen);
                            $stmt_imagen->bind_param("bi", $imagen_contenido, $producto_id);
                            $stmt_imagen->send_long_data(0, $imagen_contenido);
                            $stmt_imagen->execute();
                        }
                    }

                    // Cerrar las consultas preparadas
                    $stmt->close();
                    $stmt_imagen->close();

                    // Mostrar un mensaje de éxito
                    echo '<div class="mensaje-exito">¡La inserción se ha realizado con éxito!</div>';
                } else {
                    // Mostrar un mensaje de error si la inserción falla
                    echo '<div class="mensaje-error">Error al insertar en la base de datos.</div>';
                }
            }

            // Cerrar la conexión a la base de datos
            $conn->close();
        ?>
    </main>
    <footer class="footercontenedor" >
        <?php
            include("../phpinicio/footer.php");
        ?>
    </footer>
</body>
</html>