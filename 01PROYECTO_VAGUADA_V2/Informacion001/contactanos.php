<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../estilos/estilo.css">
      <link rel="icon" type="image/x-icon" href="../ARCHIVOS/fotos/favicon-32x32.png">
      <title>Contáctanos</title>
  </head>
  <header>
              <?php
                  include("phpblocks/menu.php");
              ?>
  </header>
  <body>
    <div class="divContacto">
      <h3 class="letrasinenlacetitulo">Contáctanos</h3>
      <br>
      <div>
        <form action="/action_page.php">
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
    </div>
  </body>
  <footer class="footercontenedor">
          <?php
              include("./phpblocks/footer.php");
          ?>
  </footer>
</html>