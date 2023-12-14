<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Not found</title>
    <link rel="stylesheet" href="./estiloespeciales.css">
    <link rel="stylesheet" href="../estilos/estilomenufooter.css">
    <link rel="stylesheet" href="../estilos/estilo2.css">
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
        <img src="./imagenes/error404coser.jpg" alt="imagen error">
        <a class="botonerror404" href="../index.php"><p>volver a la página de inicio</p></a>
    </main>
    <footer>
        <?php    
            include("../phpinicio/footer.php");
        ?>
    </footer>
</body>
</html>