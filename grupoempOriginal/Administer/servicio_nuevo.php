<?php include("restringir.php"); ?>
<?php include("acentos.php"); ?>
<?php include("funciones.php"); ?>
<?php

$editFormAction = $_SERorden['PHP_SELF'];
if (isset($_SERorden['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERorden['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	
		$codigounico = date("ymd-His");
	
		$varimagen = "SERV-".$codigounico.$_FILES['imagen']['name'];
		
		mysql_select_db($database_admin, $admin);
		$query_orden = "SELECT * FROM servicio ORDER BY id DESC";
		$orden = mysql_query($query_orden, $admin) or die(mysql_error());
		$row_orden = mysql_fetch_assoc($orden);
		$totalRows_orden = mysql_num_rows($orden);
		
  $insertSQL = sprintf("INSERT INTO servicio (categoria, nombre, descripcion, valor, imagen, fecha_inicio, duracion, orador, itinerario, publico, calificacion, nuevo, estado) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['categoria'], "text"),
					   GetSQLValueString($_POST['nombre'], "text"),
					   GetSQLValueString($_POST['descripcion'], "text"),                       
					   GetSQLValueString($_POST['valor'], "text"),
					   GetSQLValueString($varimagen, "text"),
					   GetSQLValueString($_POST['fecha_inicio'], "text"),
					   GetSQLValueString($_POST['duracion'], "text"),
					   GetSQLValueString($_POST['orador'], "text"),
					   GetSQLValueString($_POST['itinerario'], "text"),
					   GetSQLValueString($_POST['publico'], "text"),
					   GetSQLValueString($_POST['calificacion'], "text"),
					   GetSQLValueString($_POST['nuevo'], "text"),
					   GetSQLValueString($_POST['estado'], "text"));
					   
	if($_FILES['imagen']['name']!= ""){
		copy($_FILES['imagen']['tmp_name'],"../images/SERV/SERV-".$codigounico.$_FILES['imagen']['name']); 
		 $dim = getimagesize("../images/SERV/SERV-".$codigounico.$_FILES['imagen']['name']);
		 
		 if($dim[0]>=500){
				
				
  						$thumb1=new thumbnail("../images/SERV/SERV-".$codigounico.$_FILES['imagen']['name']); 
					    $thumb1->size_width(500);
					    $thumb1->jpeg_quality(90);
					    $thumb1->save("../images/SERV/SERV-".$codigounico.$_FILES['imagen']['name']);
				
		 }
 	}

  mysql_select_db($database_admin, $admin);
  $Result1 = mysql_query($insertSQL, $admin) or die(mysql_error());

  $insertGoTo = "servicio.php";
  if (isset($_SERorden['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERorden['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_admin, $admin);
$query_categorias = "SELECT * FROM categoria ORDER BY nombre ASC";
$categorias = mysql_query($query_categorias, $admin) or die(mysql_error());
$row_categorias = mysql_fetch_assoc($categorias);
$totalRows_categorias = mysql_num_rows($categorias);


?>
<!doctype html>
<html class="fixed">
	<head>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="ckfinder/ckfinder.js"></script>


	<?php include("llamadoshead.php"); ?>
		
	<script type="text/javascript">
	function fAgrega()
	{
		var ltr = ['[àáâãä]','[èéêë]','[ìíîï]','[òóôõö]','[ùúûü]','ñ','ç','[ýÿ]','\\s|\\W|_'];
		var rpl = ['a','e','i','o','u','n','c','y','-'];
		var str = String(document.getElementById("titulo").value.toLowerCase());
		var fechahoy = "<?php echo date("Y-m-"); ?>";
			
		for (var i = 0, c = ltr.length; i < c; i++)
		{
			var rgx = new RegExp(ltr[i],'g');
			str = str.replace(rgx,rpl[i]);
		};
		
	   document.getElementById("seo").value = fechahoy + str;
	}
	</script>
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
						<h2>Servicios</h2>
					
					</header>

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Nuevo Servicio</h2>
							</header>
                            <form id="form" class="form-horizontal form-bordered" action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data">
							<div class="panel-body">
                            	<div style="margin-bottom:10px;">
									<a href="servicio.php" class="mb-xs mt-xs mr-xs btn btn-default"><li class="fa fa-arrow-circle-o-left"></li> Regresar</a>
									
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
                                                        <option value="<?php echo $row_categorias['id']; ?>"><?php echo $row_categorias['nombre']; ?></option>
														<?php } while ($row_categorias = mysql_fetch_assoc($categorias)); ?>
														
													</select>
						
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Nombre del servicio</label>
												<div class="col-md-6">
													<input name="nombre" type="text" class="form-control" id="nombre" title="Ingresa el nombre del servicio."  required  onkeyup="fAgrega();">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label">Descripción</label>
												<div class="col-md-9">
													
                                                    <textarea class="input-block-level" id="summernote" name="descripcion" rows="18">
                                                    <?php echo $row_ver['descripcion']; ?>
													</textarea>
                                                    <script type="text/javascript">
													var descripcion1 = CKEDITOR.replace( 'descripcion' );
													CKFinder.setupCKEditor( descripcion1, 'ckfinder/' ) ;
													</script>
												</div>
											</div>
						

                                            <div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Valor</label>
												<div class="col-md-6">
													<input name="valor" type="text" class="form-control" id="valor" title="Ingresa el valor del servicio."  required>
												</div>
											</div>   

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Fecha de inicio</label>
												<div class="col-md-6">
													<input name="fecha_inicio" type="date" class="form-control" id="fecha_inicio" title="Ingresa la fecha de inicio servicio."  required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Duración</label>
												<div class="col-md-6">
													<input name="duracion" type="text" class="form-control" id="duracion" title="Ingresa la duración del servicio."  required>
												</div>
											</div>


											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Orador</label>
												<div class="col-md-6">
													<input name="orador" type="text" class="form-control" id="orador" title="Ingresa el orador del servicio."  required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label">Itinerario</label>
												<div class="col-md-9">
													
                                                    <textarea class="input-block-level" id="summernote" name="itinerario" rows="18">
                                                    <?php echo $row_ver['itinerario']; ?>
													</textarea>
                                                    <script type="text/javascript">
													var itinerario1 = CKEDITOR.replace( 'itinerario' );
													CKFinder.setupCKEditor( itinerario1, 'ckfinder/' ) ;
													</script>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Público</label>
												<div class="col-md-6">
													<input name="publico" type="text" class="form-control" id="publico" title="Ingresa el publico del servicio."  required>
												</div>
											</div>

						
											
												
											<div class="form-group">
												<label class="col-md-3 control-label" >Imagen</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Cambiar</span>
																<span class="fileupload-new">Seleccionar Archivo</span>
																<input name="imagen" type="file" title="Ingresa una imagen." required/>
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
                                                    <span class="help-block">Tamaño de imagen: 500px Ancho mínimo</span>
												</div>
											</div>


						
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Estado del Album</label>
												<div class="col-md-6">
													<select class="form-control mb-md" name="estado">
														<option value="1">Activo</option>
														<option value="0">Suspendido</option>
														
													</select>
						
												</div>
											</div>
						
											
											
										
										</div>
							</div>
                            <footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
                                            	<input type="hidden" name="MM_insert" value="form1" />
                                            	<input type="hidden" name="nuevo" value="1" />
                                                <input type="submit" value="Ingresar Registro"  class="btn btn-primary"/>
												<button type="reset" class="btn btn-default">Borrar Formulario</button>
											</div>
										</div>
							</footer>
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
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script src="assets/vendor/fuelux/js/spinner.js"></script>
		<script src="assets/vendor/dropzone/dropzone.js"></script>
		<script src="assets/vendor/bootstrap-markdown/js/markdown.js"></script>
		<script src="assets/vendor/bootstrap-markdown/js/to-markdown.js"></script>
		<script src="assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
		<script src="assets/vendor/codemirror/lib/codemirror.js"></script>
		<script src="assets/vendor/codemirror/addon/selection/active-line.js"></script>
		<script src="assets/vendor/codemirror/addon/edit/matchbrackets.js"></script>
		<script src="assets/vendor/codemirror/mode/javascript/javascript.js"></script>
		<script src="assets/vendor/codemirror/mode/xml/xml.js"></script>
		<script src="assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
		<script src="assets/vendor/codemirror/mode/css/css.js"></script>
		<script src="assets/vendor/summernote/summernote.js"></script>
		<script src="assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="assets/vendor/ios7-switch/ios7-switch.js"></script>
		
        <script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
        <script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
        
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/forms/examples.advanced.form.js" /></script>
		
        <script src="assets/javascripts/forms/examples.validation.js"></script>
        
       


	</body>
</html>