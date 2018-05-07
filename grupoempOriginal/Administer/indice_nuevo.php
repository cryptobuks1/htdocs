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
	
		if($_FILES['imagen']['name']!= ""){
			$varimagen = "USER-".$codigounico.$_FILES['imagen']['name'];
			copy($_FILES['imagen']['tmp_name'],"../public/USER-".$codigounico.$_FILES['imagen']['name']); 
		 	$dim = getimagesize("../public/USER-".$codigounico.$_FILES['imagen']['name']);
		 
		 	if($dim[0]>=300){
				
  						$thumb1=new thumbnail("../public/USER-".$codigounico.$_FILES['imagen']['name']); 
					    $thumb1->size_width(300);
					    $thumb1->jpeg_quality(90);
					    $thumb1->save("../public/USER-".$codigounico.$_FILES['imagen']['name']);
				
			 }

		 } else {

		 	$varimagen = "";

		 }
		
  $insertSQL = sprintf("INSERT INTO tbl_indice (titulo, direccion, telefono, celular, correo, web, ciudad, imagen, contenido, fabricante, representante, dis_exclusivo, dis_mayorista) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['titulo'], "text"),
					   GetSQLValueString($_POST['direccion'], "text"),
					   GetSQLValueString($_POST['telefono'], "text"),
					   GetSQLValueString($_POST['celular'], "text"),
					   GetSQLValueString($_POST['correo'], "text"),
					   GetSQLValueString($_POST['web'], "text"),
					   GetSQLValueString($_POST['ciudad'], "text"),
					   GetSQLValueString($varimagen, "text"),
					   GetSQLValueString($_POST['contenido'], "text"),
					   GetSQLValueString($_POST['fabricante'], "text"),
					   GetSQLValueString($_POST['representante'], "text"),
					   GetSQLValueString($_POST['dis_exclusivo'], "text"),
					   GetSQLValueString($_POST['dis_mayorista'], "text"));

  mysql_select_db($database_admin, $admin);
  $Result1 = mysql_query($insertSQL, $admin) or die(mysql_error());

  $insertGoTo = "indice.php";
  if (isset($_SERorden['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERorden['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

?>
<!doctype html>
<html class="fixed">
	<head>

	<?php include("llamadoshead.php"); ?>
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/vendor/dropzone/css/basic.css" />
		<link rel="stylesheet" href="assets/vendor/dropzone/css/dropzone.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote-bs3.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/theme/monokai.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="ckfinder/ckfinder.js"></script>



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
						<h2>Indice de Marcas</h2>
					
					</header>

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Nueva Entrada</h2>
							</header>
                            <form id="form" class="form-horizontal form-bordered" action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data">
							<div class="panel-body">
                            	<div style="margin-bottom:10px;">
									<a href="indice.php" class="mb-xs mt-xs mr-xs btn btn-default"><li class="fa fa-arrow-circle-o-left"></li> Regresar</a>
									
								</div>
								<div>
											<div class="validation-message">
											<ul></ul>
											</div>
											                                            
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Titulo</label>
												<div class="col-md-7">
													<input name="titulo" type="text" class="form-control" id="titulo" title="Ingresa el Nombre del proveedor."  required >
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
																<input name="imagen" type="file"/>
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
                                                    <span class="help-block">Tamaño de imagen: 500px Ancho mínimo</span>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Dirección</label>
												<div class="col-md-7">
													<input name="direccion" type="text" class="form-control" id="direccion"  >
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Teléfono</label>
												<div class="col-md-7">
													<input name="telefono" type="text" class="form-control" id="telefono"  >
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Celular</label>
												<div class="col-md-7">
													<input name="celular" type="text" class="form-control" id="celular"  >
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Correo</label>
												<div class="col-md-7">
													<input name="correo" type="text" class="form-control" id="correo"  >
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Web</label>
												<div class="col-md-7">
													<input name="web" type="text" class="form-control" id="web" >
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Ciudad</label>
												<div class="col-md-7">
													<input name="ciudad" type="text" class="form-control" id="ciudad"  >
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Seleccionar</label>
												<div class="col-md-7">
													<div class="checkbox-custom checkbox-primary">
														<input type="checkbox" value="1" name="fabricante" id="fabricante">
														<label for="fabricante">Fabricante</label>
													</div>

													<div class="checkbox-custom checkbox-primary">
														<input type="checkbox" value="1" name="representante" id="representante">
														<label for="representante">Representante</label>
													</div>

													<div class="checkbox-custom checkbox-primary">
														<input type="checkbox" value="1" name="dis_exclusivo" id="dis_exclusivo">
														<label for="dis_exclusivo">Distribuidor Exclusivo</label>
													</div>

													<div class="checkbox-custom checkbox-primary">
														<input type="checkbox" value="1" name="dis_mayorista" id="dis_mayorista">
														<label for="dis_mayorista">Distribuidor Mayorista</label>
													</div>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Contenido</label>
												
											</div>

											<div class="form-group">
												<div class="col-sm-10 col-sm-offset-1">
													<textarea name="contenido" id="contenido">
														<div style="width:30%; float:left; position:relative;">
															<ul>
																<li>Columna 1</li>
															</ul>
														</div>

														<div style="width:30%; float:left; position:relative;">
															<ul>
																<li>Columna 2</li>
															</ul>
														</div>

														<div style="width:30%; float:left; position:relative;">
															<ul>
																<li>Columna 3</li>
															</ul>
														</div>
													</textarea>
													<script type="text/javascript">
													var contenido1 = CKEDITOR.replace( 'contenido' );
													CKFinder.setupCKEditor( contenido1, 'ckfinder/' ) ;
													</script>
												</div>
											</div>
											
										
										</div>
							</div>
                            <footer class="panel-footer">
										<div class="row">
											<div class="col-sm-7 col-sm-offset-3">
                                            	<input type="hidden" name="MM_insert" value="form1" />
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
        
        <script type="text/javascript">
		$(document).ready(function() {
			$('#summernote').summernote({
				minHeight: 200,
				codemirror: {
				  mode: 'text/html',
				  htmlMode: true,
				  lineNumbers: true,
				  theme: 'monokai'
				},
				onImageUpload: function(files, editor, welEditable) {
					sendFile(files[0], editor, welEditable);
				}
			});
			function sendFile(file, editor, welEditable) {
				data = new FormData();
				data.append("file", file);
				$.ajax({
					data: data,
					type: 'POST',
					xhr: function() {
						var myXhr = $.ajaxSettings.xhr();
						if (myXhr.upload) myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
						return myXhr;
					},
					url: 'savetheuploadedfile.php',
					cache: false,
					contentType: false,
					processData: false,
					success: function(url) {
						editor.insertImage(welEditable, url);
					}
				});
			}
		
			// update progress bar
		
			function progressHandlingFunction(e){
				if(e.lengthComputable){
					$('progress').attr({value:e.loaded, max:e.total});
					// reset progress on complete
					if (e.loaded == e.total) {
						$('progress').attr('value','0.0');
					}
				}
			}
			/*
			function sendFile(file, editor, welEditable) {
				data = new FormData();
				data.append("file", file);//You can append as many data as you want. Check mozilla docs for this
				$.ajax({
					data: data,
					type: "POST",
					url: 'savetheuploadedfile.php',
					cache: false,
					contentType: false,
					processData: false,
					success: function(url) {
						editor.insertImage(welEditable, url);
					}
				});
			}*/
		});
		</script>


	</body>
</html>