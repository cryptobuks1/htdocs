<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Ventana emergente jQuery animado</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="/resources/demos/external/jquery.bgiframe-2.1.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://www.proyectosbds.com/html/css/layout.css" />
    <script>
    function abrir_dialog() {
      $( "#dialog" ).dialog({
          show: "blind",
          hide: "explode"
      });
    };
    </script>
</head>
  <body style="background:#ddd">

    <div id="dialog" title="Titulo dialog" style="display:none;">
        <p>Contenido de la ventana.</p>
        <input type="text" name="text" placeholder="hola"/>
    </div>

    <button onclick="abrir_dialog()">Abrir ventana emergente</button>

</body>
</html>