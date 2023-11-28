<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../estilos/estilo2.css">
</head>
<body>
    <header>
        <p>MENÚ PERSONALIZADO PARA ADMIN</p>
    </header>
    <main class="maininsertar" >
        <div class="divinicioinsertar">
            <h1></h1>
        </div>
        <div class="divinsertar" >
            <form action="procesar_formulario.php" method="post" enctype="multipart/form-data">
                <div>
                    <h3>Requisitos obligatorios</h3><h3>*</h3>
                </div>
                <div class="textfielduno">
                    <label for="nombre_prenda">Nombre de la prenda:</label>
                    <input type="text" name="nombre_prenda" class="form-control" required>
                </div>

                <div class="textfielddos">
                    <label for="descripcion_prenda">Descripción de la prenda:</label>
                    <textarea name="descripcion_prenda" class="form-control" rows="4" required></textarea>
                </div>

                <div class="textfieldtres">
                    <label for="precio_prenda">Precio de la prenda:</label>
                    <input type="number" name="precio_prenda" class="form-control" step="0.01" required>
                </div>

                <div class="textfieldcuatro">
                    <label for="imagen_principal">Imagen principal:</label>
                    <input type="file" name="imagen_principal" class="form-control-file" accept="image/*" required>
                </div>

                <div class="textfieldcinco">
                    <label for="imagen_1">Imagen 1:</label>
                    <input type="file" name="imagen_1" class="form-control-file" accept="image/*">
                </div>

                <div class="textfieldseis">
                    <label for="imagen_2">Imagen 2:</label>
                    <input type="file" name="imagen_2" class="form-control-file" accept="image/*">
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
    </main>
    <footer class="footercontenedor" >
        <?php
            include("../phpinicio/footer.php");
        ?>
    </footer>
</body>
</html>