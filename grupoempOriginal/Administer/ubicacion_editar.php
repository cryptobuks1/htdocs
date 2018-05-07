<?php include("restringir.php"); ?>
<?php include("acentos.php"); ?>
<?php include("funciones.php"); ?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	
	if($_POST['edicion']=="SI"){
		$latitud = $_POST['lat'];
		$longitud = $_POST['long'];
		}
	if($_POST['edicion']=="NO"){
		$latitud = $_POST['lat2'];
		$longitud = $_POST['long2'];
		}

  $updateSQL = sprintf("UPDATE tbl_ubicaciones SET nombre=%s, texto=%s, latitud=%s, longitud=%s, categoria=%s WHERE id=%s",
                       GetSQLValueString($_POST['nombre'], "text"),
					   GetSQLValueString($_POST['texto'], "text"),
                       GetSQLValueString($latitud, "text"),
					   GetSQLValueString($longitud, "text"),
					   GetSQLValueString($_POST['categoria'], "text"),
                       GetSQLValueString($_POST['id'], "int"));


  mysql_select_db($database_admin, $admin);
  $Result1 = mysql_query($updateSQL, $admin) or die(mysql_error());

  $updateGoTo = "ubicacion.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_editar = "-1";
if (isset($_GET['id'])) {
  $colname_editar = $_GET['id'];
}
mysql_select_db($database_admin, $admin);
$query_editar = sprintf("SELECT * FROM tbl_ubicaciones WHERE id = %s", GetSQLValueString($colname_editar, "int"));
$editar = mysql_query($query_editar, $admin) or die(mysql_error());
$row_editar = mysql_fetch_assoc($editar);
$totalRows_editar = mysql_num_rows($editar);

mysql_select_db($database_admin, $admin);
$query_categorias = "SELECT * FROM tbl_ubicaciones_categorias ORDER BY nombre ASC";
$categorias = mysql_query($query_categorias, $admin) or die(mysql_error());
$row_categorias = mysql_fetch_assoc($categorias);
$totalRows_categorias = mysql_num_rows($categorias);

?>
<!doctype html>
<html class="fixed">
	<head>

	<?php include("llamadoshead.php"); ?>
		

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<?php include("header.php"); ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include("nav.php");?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Ubicaciones</h2>
					
					</header>

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Editar Ubicación</h2>
							</header>
                            <form id="form" class="form-horizontal form-bordered" action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data">
							<div class="panel-body">
                            	<div style="margin-bottom:10px;">
									<a href="ubicacion.php" class="mb-xs mt-xs mr-xs btn btn-default"><li class="fa fa-arrow-circle-o-left"></li> Regresar</a>
									
								</div>
								<div>
											<div class="validation-message">
											<ul></ul>
											</div>
                                           
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Categoria</label>
												<div class="col-md-6">
													<select class="form-control mb-md" name="categoria">
														<?php do{ ?>
                                                        <option value="<?php echo $row_categorias['id']; ?>" <?php if($row_categorias['id']==$row_editar['categoria']){ echo " selected"; } ?>><?php echo $row_categorias['nombre']; ?></option>
														<?php } while ($row_categorias = mysql_fetch_assoc($categorias)); ?>
														
													</select>
						
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Titulo</label>
												<div class="col-md-6">
													<input name="nombre" type="text" class="form-control" id="nombre" title="Ingresa el titulo del banner."  required value="<?php echo $row_editar['nombre']; ?>">
												</div>
											</div>

						
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDisabled">Contenido</label>
												<div class="col-md-6">
													<textarea name="texto" class="form-control" rows="3" id="texto" data-plugin-textarea-autosize="" style="oordenflow: hidden; word-wrap: break-word; resize: none; height: 74px;"><?php echo $row_editar['texto']; ?></textarea>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="inputDisabled">Ubicación Actual</label>
												<div class="col-md-6">
													<div id="map_canvas2" style="width:450px;height:300px;"></div>
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" >Cambiar Ubicación?</label>
												<div class="col-md-6">
													<select class="form-control mb-md" name="edicion" id="edicion">
														<option value="NO" >NO</option>
														<option value="SI" >SI</option>
														
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDisabled">Nueva Ubicación</label>
												<div class="col-md-6">
													<input type="text" class="form-control" id="direccion" name="direccion" value="Cali, Valle del cauca"/> 
													<button id="pasar" class="button">Obtener Ubicación</button>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDisabled"></label>
												<div class="col-md-6">
													<div id="map_canvas" style="width:450px;height:300px;"></div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDisabled">Latitud</label>
												<div class="col-md-6">
													<input name="lat" type="text" class="form-control" id="lat" title="Ingresa un valor." value="-37.97615115045809"  required  >
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDisabled">Longitud</label>
												<div class="col-md-6">
													<input name="long" type="text" class="form-control" id="long" title="Ingresa un valor." value="-56.92766310688478"  required  >
												</div>
											</div>

											<input type="hidden" name="lat2" id="lat2" value="<?php echo $row_editar['latitud']; ?>" />
											<input type="hidden" name="long2" id="long2" value="<?php echo $row_editar['longitud']; ?>" />
						
										                                 								
											
										
										</div>
							</div>
                            <footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
                                            	<input type="hidden" name="MM_insert" value="form1" />
                                                <input type="submit" value="Editar Registro"  class="btn btn-primary"/>
											</div>
										</div>
							</footer>
							<input type="hidden" name="MM_update" value="form1" />
							<input type="hidden" name="id" value="<?php echo $row_editar['id']; ?>" />
                            <input name="imagen" type="hidden" id="imagen" value="<?php echo $row_editar['imagen']; ?>" />
                            </form>
						</section>
					<!-- end: page -->
				</section>
			</div>

			
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
        <script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		
        <script src="assets/javascripts/forms/examples.validation.js"></script>


        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
        <script type="text/javascript" src="ui/jquery.min.js"></script>
        <script type="text/javascript" src="ui/jquery.ui.map.js"></script>
        <script type="text/javascript">
            //Declaramos las variables que vamos a user
var lat = null;
var lng = null;
var map = null;
var geocoder = null;
var marker = null;
         
jQuery(document).ready(function(){
     //obtenemos los valores en caso de tenerlos en un formulario ya guardado en la base de datos
     lat = jQuery('#lat').val();
     lng = jQuery('#long').val();
     //Asignamos al evento click del boton la funcion codeAddress
     jQuery('#pasar').click(function(){
        codeAddress();
        return false;
     });
     //Inicializamos la función de google maps una vez el DOM este cargado
    initialize();
});
     
    function initialize() {
     
      geocoder = new google.maps.Geocoder();
        
       //Si hay valores creamos un objeto Latlng
       if(lat !='' && lng != '')
      {
         var latLng = new google.maps.LatLng(lat,lng);
      }
      else
      {
        //Si no creamos el objeto con una latitud cualquiera como la de Mar del Plata, Argentina por ej
         var latLng = new google.maps.LatLng(-37.97615115045809,-56.92766310688478);
      }
      //Definimos algunas opciones del mapa a crear
       var myOptions = {
          center: latLng,//centro del mapa
          zoom: 15,//zoom del mapa
          mapTypeId: google.maps.MapTypeId.ROADMAP //tipo de mapa, carretera, híbrido,etc
        };
        //creamos el mapa con las opciones anteriores y le pasamos el elemento div
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
         
        //creamos el marcador en el mapa
        marker = new google.maps.Marker({
            map: map,//el mapa creado en el paso anterior
            position: latLng,//objeto con latitud y longitud
            draggable: true //que el marcador se pueda arrastrar
        });
        
       //función que actualiza los input del formulario con las nuevas latitudes
       //Estos campos suelen ser hidden
        updatePosition(latLng);
         
         
    }
     
    //funcion que traduce la direccion en coordenadas
    function codeAddress() {
         
        //obtengo la direccion del formulario
        var address = document.getElementById("direccion").value;
        //hago la llamada al geodecoder
        geocoder.geocode( { 'address': address}, function(results, status) {
         
        //si el estado de la llamado es OK
        if (status == google.maps.GeocoderStatus.OK) {
            //centro el mapa en las coordenadas obtenidas
            map.setCenter(results[0].geometry.location);
            //coloco el marcador en dichas coordenadas
            marker.setPosition(results[0].geometry.location);
            //actualizo el formulario      
            updatePosition(results[0].geometry.location);
             
            //Añado un listener para cuando el markador se termine de arrastrar
            //actualize el formulario con las nuevas coordenadas
            google.maps.event.addListener(marker, 'dragend', function(){
                updatePosition(marker.getPosition());
            });
      } else {
          //si no es OK devuelvo error
          alert("No podemos encontrar la direcci&oacute;n, error: " + status);
      }
    });
  }
   
  //funcion que simplemente actualiza los campos del formulario
  function updatePosition(latLng)
  {
       
       jQuery('#lat').val(latLng.lat());
       jQuery('#long').val(latLng.lng());
   
  }
  
	  
	$('#map_canvas2').gmap({'zoom':15, 'center':'<?php echo $row_editar['latitud']; ?>,<?php echo $row_editar['longitud']; ?>'}).bind('init', function() {
		$('#map_canvas2').gmap('addMarker', {'position':'<?php echo $row_editar['latitud']; ?>,<?php echo $row_editar['longitud']; ?>', 'bounds':false}).click(function() {
			$('#map_canvas2').gmap('openInfoWindow', {'content': 'Hello World'}, this);
		});
	});  
     
	

     
        </script>


	</body>
</html>