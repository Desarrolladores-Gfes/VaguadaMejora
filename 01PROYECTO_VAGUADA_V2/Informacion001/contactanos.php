<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../estilos/estilomenufooter.css">
      <link rel="stylesheet" type="text/css" href="../estilos/estilo2.css">
      <link rel="stylesheet" type="text/css" href="estiloinfo.css">
      <link rel="icon" type="image/x-icon" href="../ARCHIVOS/fotos/favicon-32x32.png">
      <title>Contáctanos</title>
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
    <main class="maincontact">
        <div class="divContacto">
            <h3 class="letrasinenlacetitulo">Contáctanos</h3>
            <form class="formulario" action="/action_page.php">
                <label class="letrasinenlace" for="fname">Nombre</label>
                <input type="text" id="fname" name="firstname" placeholder="Tu nombre...">
            
                <label class="letrasinenlace" for="lname">Correo electrónico</label>
                <input type="text" id="lname" name="lastname" placeholder="Correo electrónico...">
            
                <label class="letrasinenlace" for="country">Asunto</label>
                <select id="country" name="country">
                    <option value="australia">Seleccione...</option>
                    <option value="canada">Problemas o reclamaciones</option>
                    <option value="canada">Sugerencia</option>
                    <option value="usa">Petición</option>
                </select>

                <a class="letrasinenlace" href="/index.html"><div id="enviar">Enviar</div></a>
            </form>
        </div>
    </main>
  </body>
  <footer class="footercontenedor">
    <?php
        include("../phpinicio/footer.php");
    ?>
  </footer>
</html>