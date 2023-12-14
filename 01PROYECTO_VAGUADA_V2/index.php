<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sfera</title>
    <link rel="icon" type="image/x-icon" href="http://drive.google.com/uc?export=view&id=1rOy5lWGsWbryxJL5eWdvYbyMtVnU1Yd0">
    <link rel="stylesheet" type="text/css" href="estilos/estilo2.css">
    <link rel="stylesheet" type="text/css" href="estilos/estilomenufooter.css">
</head>
<body>
    <header>
        <?php
            $rutaFoto = "index.php";
            $ruta = "CarpetaRopa/ColeccionMujer/mujer.php";
            $ruta1 = "CarpetaRopa/ColeccionHombre/hombre.php";
            $ruta2 = "CarpetaRopa/ColecciónNiño/niño.php";
            $ruta3 = "Informacion001/comollegar.php";
            $ruta4 = "paginasprincipales/configuser.php";
            $ruta5 = "phplogin/login.php";
            $ruta6 = "phplogin/registro.php";
            include("phpinicio/menu.php");
        ?>
    </header>
    <main>
        <?php
            include("phpinicio/body.php");
        ?>
    </main>
    <footer class="footercontenedor">
        <?php
            include("phpinicio/footer.php");
        ?>
    </footer>
</body>
</html>
