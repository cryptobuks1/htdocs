<?php include("restringir.php"); ?>
<?php include("acentos.php"); ?>
<?php include("funciones.php"); ?>
<?php
$varmenu="catalogo";

$editFormAction = $_SERorden['PHP_SELF'];
if (isset($_SERorden['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERorden['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	
		$codigounico = date("ymd-His");
	
		$varimagen = "CAT-".$codigounico.$_FILES['imagen']['name'];
		
		mysql_select_db($database_admin, $admin);
		$query_orden = "SELECT * FROM tbl_productos_cat ORDER BY id DESC";
		$orden = mysql_query($query_orden, $admin) or die(mysql_error());
		$row_orden = mysql_fetch_assoc($orden);
		$totalRows_orden = mysql_num_rows($orden);
		
  $insertSQL = sprintf("INSERT INTO tbl_productos_cat (nombre, code, imagen, cabezote, des, orden, estado, parent) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nombre'], "text"),
					   GetSQLValueString($_POST['seo'], "text"),
                       GetSQLValueString($varimagen, "text"),
					   GetSQLValueString($_POST['cabezote'], "text"),
					   GetSQLValueString($_POST['des'], "text"),
					   GetSQLValueString(($row_orden['orden']+1), "text"),
					   GetSQLValueString($_POST['estado'], "text"),
					   GetSQLValueString('0', "text"));
					   
	if($_FILES['imagen']['name']!= ""){
		copy($_FILES['imagen']['tmp_name'],"../public/CAT-".$codigounico.$_FILES['imagen']['name']); 
		 
 	}

  mysql_select_db($database_admin, $admin);
  $Result1 = mysql_query($insertSQL, $admin) or die(mysql_error());

  $insertGoTo = "catalogo_categorias.php";
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
		
	<script type="text/javascript">
	function fAgrega()
	{
		var ltr = ['[àáâãä]','[èéêë]','[ìíîï]','[òóôõö]','[ùúûü]','ñ','ç','[ýÿ]','\\s|\\W|_'];
		var rpl = ['a','e','i','o','u','n','c','y','-'];
		var str = String(document.getElementById("nombre").value.toLowerCase());
		
			
		for (var i = 0, c = ltr.length; i < c; i++)
		{
			var rgx = new RegExp(ltr[i],'g');
			str = str.replace(rgx,rpl[i]);
		};
		
	   document.getElementById("seo").value = str;
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
						<h2>Categorias Catalogo</h2>
					
					</header>

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Nueva Categoria</h2>
							</header>
                            <form id="form" class="form-horizontal form-bordered" action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data">
							<div class="panel-body">
                            	<div style="margin-bottom:10px;">
									<a href="catalogo_categorias.php" class="mb-xs mt-xs mr-xs btn btn-default"><li class="fa fa-arrow-circle-o-left"></li> Regresar</a>
									
								</div>
								<div>
											<div class="validation-message">
											<ul></ul>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Nombre Categoria</label>
												<div class="col-md-6">
													<input name="nombre" type="text" class="form-control" id="nombre" title="Ingresa el nombre de la categoria."  required  onkeyup="fAgrega();">
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">SEO URL</label>
												<div class="col-md-6">
													<input name="seo" type="text" class="form-control" id="seo" title="Ingresa un contenido SEO URL."  required>
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label">Cabezote</label>
												<div class="col-md-7">
                                                	<progress></progress>
													<textarea class="input-block-level" id="summernote" name="cabezote" rows="18">
                                                    No Aplica
													</textarea>
                                                    
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="inputDisabled">Descripción</label>
												<div class="col-md-6">
													<textarea name="des" class="form-control" rows="3" id="des" data-plugin-textarea-autosize="" style="oordenflow: hidden; word-wrap: break-word; resize: none; height: 74px;"></textarea>
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
												<label class="col-md-3 control-label" for="inputSuccess">Estado de la categoría</label>
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