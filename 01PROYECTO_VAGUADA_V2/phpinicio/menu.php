<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <div class="menuIndex">
            <ul class="menuHorizontal">
                <li><a class="menuAimg" href="<?php echo $rutaFoto; ?>"><img src="http://drive.google.com/uc?export=view&id=16GcTpZ6uZwp-5B5HXMWsJVPAF8TOMUA8" alt=""></a></li>
                <li class="letramenu" >
                    <div class="divmenuinicio">
                        <div class="iniciocontenedor" >
                            <a class="menuHorizontal001" id="upp" href="<?php echo $ruta; ?>">mujer</a>
                            <a class="menuHorizontal001" id="upp" href= "<?php echo $ruta1; ?>">hombre</a>
                            <a class="menuHorizontal001" id="upp" href= "<?php echo $ruta2; ?>">infantil</a>
                            <a class="menuHorizontal001" id="upp" href= "<?php echo $ruta3; ?>">información</a>
                        </div>
                        <?php
                            // Inicia la sesión
                            session_start();
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                                echo '<a class="menuHorizontal001" href= "./paginasprincipales/configuser.php">Bienvenido: ' . $_SESSION['user_name'] . '</a>';
                            } else {
                                echo '<a class="menuHorizontal001" id="upp" href= "phplogin/login.php">inicio de sesión</a>';
                                echo '<a class="menuHorizontal001" id="upp" href= "phplogin/registro.php">registro</a>';
                            }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </header>
</body>
</html>

<!--href= "CarpetaRopa/ColeccionMujer/mujer.php"-->
<!--href= "CarpetaRopa/ColeccionHombre/hombre.php"-->
<!--href= "CarpetaRopa/ColecciónNiño/niño.php"-->
<!--href= "Informacion001/comollegar.php"-->
<!--href= "index.php"-->