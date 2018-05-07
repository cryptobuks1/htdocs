<?php include("restringir.php"); ?>
<?php include("acentos.php"); ?>
<?php include("funciones.php"); ?>
<?php

$editFormAction = $_SERorden['PHP_SELF'];
if (isset($_SERorden['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERorden['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	
	$codigounico = date("ymd-His");
	
	if($_FILES['ima']['name']==""){
		$varimagen = $_POST['imagen'];
	} else {
		$varimagen = "POST-".$codigounico.$_FILES['ima']['name'];
		}
				
  $updateSQL = sprintf("UPDATE tbl_post SET autor=%s, titulo=%s, code=%s, descripcion=%s, detalle=%s, embed=%s, fecha=%s, estado=%s, galeria=%s, imagen=%s WHERE id=%s",
                       GetSQLValueString($_POST['autor'], "text"),
					   GetSQLValueString($_POST['titulo'], "text"),
					   GetSQLValueString($_POST['seo'], "text"),
					   GetSQLValueString($_POST['descripcion'], "text"),
					   GetSQLValueString($_POST['detalle'], "text"),
					   GetSQLValueString($_POST['embed'], "text"),
					   GetSQLValueString($_POST['fecha'], "text"),
					   GetSQLValueString($_POST['estado'], "text"),
					   GetSQLValueString($_POST['galeria'], "text"),
                       GetSQLValueString($varimagen, "text"),
					    GetSQLValueString($_POST['id'], "int"));
  
  
  if($_FILES['ima']['name']!= ""){
		copy($_FILES['ima']['tmp_name'],"../public/POST-".$codigounico.$_FILES['ima']['name']); 
		 $dim = getimagesize("../public/POST-".$codigounico.$_FILES['ima']['name']);
		 
		 if($dim[0]>=500){
				
				
  						$thumb1=new thumbnail("../public/POST-".$codigounico.$_FILES['ima']['name']); 
					    $thumb1->size_width(500);
					    $thumb1->jpeg_quality(90);
					    $thumb1->save("../public/POST-".$codigounico.$_FILES['ima']['name']);
				
		 }
 	}

  mysql_select_db($database_admin, $admin);
  $Result1 = mysql_query($updateSQL, $admin) or die(mysql_error());

  if($_POST['categorias']!=""){

 	 $categorias = $_POST['categorias'];
		  foreach($categorias AS $key=>$values)
		  {

		  	 $insertSQL = sprintf("INSERT INTO tbl_post_relacion (post, categoria) VALUES (%s, %s)",
					   GetSQLValueString($_POST['id'], "text"),
					   GetSQLValueString($values, "text"));

			  mysql_select_db($database_admin, $admin);
			  $Result1 = mysql_query($insertSQL, $admin) or die(mysql_error());

		  }
	}

  $updateGoTo = "post.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_admin, $admin);
$query_categorias = "SELECT * FROM tbl_post_categorias ORDER BY nombre ASC";
$categorias = mysql_query($query_categorias, $admin) or die(mysql_error());
$row_categorias = mysql_fetch_assoc($categorias);
$totalRows_categorias = mysql_num_rows($categorias);

mysql_select_db($database_admin, $admin);
$query_galeria = "SELECT * FROM tbl_album WHERE vincular = '1' ORDER BY id DESC";
$galeria = mysql_query($query_galeria, $admin) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);
$totalRows_galeria = mysql_num_rows($galeria);

mysql_select_db($database_admin, $admin);
$query_editar = "SELECT * FROM tbl_post WHERE id = '".$_GET['id']."' ORDER BY id DESC";
$editar = mysql_query($query_editar, $admin) or die(mysql_error());
$row_editar = mysql_fetch_assoc($editar);
$totalRows_editar = mysql_num_rows($editar);

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
						<h2>Entradas</h2>
					
					</header>

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Editar Entrada</h2>
							</header>
                            <form id="form" class="form-horizontal form-bordered" action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data">
							<div class="panel-body">
                            	<div style="margin-bottom:10px;">
									<a href="post.php" class="mb-xs mt-xs mr-xs btn btn-default"><li class="fa fa-arrow-circle-o-left"></li> Regresar</a>
									
								</div>
								<div>
											<div class="validation-message">
											<ul></ul>
											</div>
                                            <div class="form-group">
												<label class="col-md-2 control-label">Categoria Actual</label>
												<div class="col-md-9">
													<?php 

														mysql_select_db($database_admin, $admin);
														$query_vercat = "SELECT * FROM tbl_post_relacion WHERE post = '".$row_editar['id']."' ORDER BY id DESC";
														$vercat = mysql_query($query_vercat, $admin) or die(mysql_error());
														$row_vercat = mysql_fetch_assoc($vercat);
														$totalRows_vercat = mysql_num_rows($vercat);

														do{

															mysql_select_db($database_admin, $admin);
															$query_vercategoria = "SELECT * FROM tbl_post_categorias WHERE code = '".$row_vercat['categoria']."' ";
															$vercategoria = mysql_query($query_vercategoria, $admin) or die(mysql_error());
															$row_vercategoria = mysql_fetch_assoc($vercategoria);
															$totalRows_vercategoria = mysql_num_rows($vercategoria);

															?>

															<a href="post_delete_cat.php?id=<?php echo $_GET['id']; ?>&del=<?php echo $row_vercat['id']; ?>" class="mb-xs mt-xs mr-xs btn btn-xs btn-primary"><i class="fa fa-times"></i> <?php echo $row_vercategoria['nombre']; ?></a>

															<?php

														} while ($row_vercat = mysql_fetch_assoc($vercat));

													?>													
												</div>
											</div>

                                            <div class="form-group">
												<label class="col-md-2 control-label">Nueva Categoria</label>
												<div class="col-md-9">
													<select multiple data-plugin-selectTwo class="form-control populate" name="categorias[]" id="categorias">
														
															<?php do{ ?>
                                                        	<option value="<?php echo $row_categorias['code']; ?>"><?php echo $row_categorias['nombre']; ?></option>
															<?php } while ($row_categorias = mysql_fetch_assoc($categorias)); ?>
															
														
													</select>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Autor</label>
												<div class="col-md-9">
													<input name="autor" type="text" class="form-control" id="autor" title="Ingresa el autor de la entrada."  required value="<?php echo $row_editar['autor']; ?>">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Titulo</label>
												<div class="col-md-9">
													<input name="titulo" type="text" class="form-control" id="titulo" title="Ingresa el titulo de la entrada."  required  value="<?php echo $row_editar['titulo']; ?>">
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">SEO URL</label>
												<div class="col-md-9">
													<input name="seo" type="text" class="form-control" id="seo" title="Ingresa un contenido SEO URL."  required value="<?php echo $row_editar['code']; ?>">
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-2 control-label" for="inputDisabled">Descripción</label>
												<div class="col-md-9">
													<textarea name="descripcion" class="form-control" rows="3" id="descripcion" data-plugin-textarea-autosize="" style="oordenflow: hidden; word-wrap: break-word; resize: none; height: 74px;" required title="Ingresa una breve descripcion para la entrada." data-plugin-maxlength maxlength="300"><?php echo $row_editar['descripcion']; ?></textarea>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Imagen Actual</label>
												<div class="col-md-6">
													<div class="post-image">
												<div class="img-thumbnail">
													
														<a><img src="../public/<?php echo $row_editar['imagen']; ?>" alt="" width="300"></a>
													
												</div>
											</div>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-md-2 control-label" >Imagen</label>
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
																<input name="ima" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
                                                    <span class="help-block">Tamaño de imagen: 500px Ancho mínimo</span>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-2 control-label">Detalle</label>
												<div class="col-md-9">
                                                	
													<textarea class="input-block-level" id="summernote" name="detalle" rows="18">
                                                   <?php echo $row_editar['detalle']; ?>
													</textarea>
                                                    <script type="text/javascript">
													var detalle1 = CKEDITOR.replace( 'detalle' );
													CKFinder.setupCKEditor( detalle1, 'ckfinder/' ) ;
													</script>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-2 control-label">Fecha</label>
												<div class="col-md-6">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" name="fecha" data-plugin-datepicker="" class="form-control" required title="Debes ingresar una fecha para la entrada." value="<?php echo $row_editar['fecha']; ?>">
													</div>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDisabled">Embed</label>
												<div class="col-md-9">
													<textarea name="embed" class="form-control" rows="3" id="embed" data-plugin-textarea-autosize="" style="oordenflow: hidden; word-wrap: break-word; resize: none; height: 74px;"><?php echo $row_editar['embed']; ?></textarea>
                                                    <span class="help-block">Espacio reservado para ingresar widgets o iframes desde otros sitios.</span>
												</div>
											</div>
												
											<div class="form-group">
												<label class="col-md-2 control-label" for="inputSuccess">Galería</label>
												<div class="col-md-6">
													<select class="form-control mb-md" name="galeria">
														<option></option>
														<?php do{ ?>
                                                        <option value="<?php echo $row_galeria['id']; ?>" <?php if($row_galeria['id']==$row_editar['galeria']){ echo " selected"; } ?>><?php echo $row_galeria['titulo']; ?></option>
														<?php } while ($row_galeria = mysql_fetch_assoc($galeria)); ?>
														
													</select>
													<span class="help-block">Para vincular una galería primero debe ser creada y activar la opcion de vincular.</span>
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-2 control-label" for="inputSuccess">Publicar?</label>
												<div class="col-md-6">
													<select class="form-control mb-md" name="estado">
														<option value="1" <?php if($row_editar['estado']=="1"){ echo " selected"; } ?>>Si</option>
														<option value="0" <?php if($row_editar['estado']=="0"){ echo " selected"; } ?>>No</option>
														
													</select>
						
												</div>
											</div>
						
											
											
										
										</div>
							</div>
                            <footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-2">
                                            	<input type="hidden" name="imagen" value="<?php echo $row_editar['imagen']; ?>" />
                                            	<input type="hidden" name="MM_update" value="form1" />
                                                <input type="hidden" name="id" value="<?php echo $row_editar['id']; ?>" />
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