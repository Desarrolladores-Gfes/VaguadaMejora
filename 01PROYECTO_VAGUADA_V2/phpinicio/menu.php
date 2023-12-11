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
                <li><a class="menuAimg" href="./index.php"><img src="http://drive.google.com/uc?export=view&id=16GcTpZ6uZwp-5B5HXMWsJVPAF8TOMUA8" alt=""></a></li>
                <li class="letramenu" >
                    <div class="divmenuinicio">
                        <a class="menuHorizontal001" id="upp" href= "CarpetaRopa/ColeccionMujer/mujer.php">mujer</a>
                        <a class="menuHorizontal001" id="upp" href= "CarpetaRopa/ColeccionHombre/hombre.php">hombre</a>
                        <a class="menuHorizontal001" id="upp" href= "CarpetaRopa/ColecciónNiño/niño.php">infantil</a>
                        <a class="menuHorizontal001" id="upp" href= "Informacion001/comollegar.php">información</a>
                        <?php
                            // Inicia la sesión (esto debe ir al inicio de tu archivo PHP)
                            session_start();

                            // Verifica si el usuario ha iniciado sesión
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                                // Muestra el mensaje de bienvenida con el nombre del usuario
                                echo '<a class="menuHorizontal001" href= "./paginasprincipales/configuser.php">Bienvenido: ' . $_SESSION['user_name'] . '</a>';
                            } else {
                                // Si no ha iniciado sesión, muestra los enlaces de inicio de sesión y registro
                                echo '<a class="menuHorizontal001" id="upp" href= "phplogin/login.php">inicio de sesión</a>';
                                echo '<a class="menuHorizontal001" id="upp" href= "phplogin/registro.php">registro</a>';
                            }
                        ?>
                    </div>
                </li>
                <li><a class="" href=""></a></li>
            </ul>
        </div>
    </header>
</body>
</html>