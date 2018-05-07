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
	
		$varimagen = "VIDEO-".$codigounico.$_FILES['imagen']['name'];
		
		mysql_select_db($database_admin, $admin);
		$query_orden = "SELECT * FROM tbl_videos ORDER BY id DESC";
		$orden = mysql_query($query_orden, $admin) or die(mysql_error());
		$row_orden = mysql_fetch_assoc($orden);
		$totalRows_orden = mysql_num_rows($orden);
		
  $insertSQL = sprintf("INSERT INTO tbl_videos (titulo, code, contenido, imagen, orden, estado, categoria, embed) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['titulo'], "text"),
					   GetSQLValueString($_POST['seo'], "text"),
					   GetSQLValueString($_POST['contenido'], "text"),
                       GetSQLValueString($varimagen, "text"),
					   GetSQLValueString(($row_orden['orden']+1), "text"),
					   GetSQLValueString($_POST['estado'], "text"),
					   GetSQLValueString($_POST['categoria'], "text"),
					   GetSQLValueString($_POST['embed'], "text"));
					   
	if($_FILES['imagen']['name']!= ""){
		copy($_FILES['imagen']['tmp_name'],"../public/VIDEO-".$codigounico.$_FILES['imagen']['name']); 
		 $dim = getimagesize("../public/VIDEO-".$codigounico.$_FILES['imagen']['name']);
		 
		 if($dim[0]>=500){
				
				
  						$thumb1=new thumbnail("../public/VIDEO-".$codigounico.$_FILES['imagen']['name']); 
					    $thumb1->size_width(500);
					    $thumb1->jpeg_quality(90);
					    $thumb1->save("../public/VIDEO-".$codigounico.$_FILES['imagen']['name']);
				
		 }
 	}

  mysql_select_db($database_admin, $admin);
  $Result1 = mysql_query($insertSQL, $admin) or die(mysql_error());

  $insertGoTo = "video.php";
  if (isset($_SERorden['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERorden['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_admin, $admin);
$query_categorias = "SELECT * FROM tbl_videos_categorias ORDER BY nombre ASC";
$categorias = mysql_query($query_categorias, $admin) or die(mysql_error());
$row_categorias = mysql_fetch_assoc($categorias);
$totalRows_categorias = mysql_num_rows($categorias);

?>
<!doctype html>
<html class="fixed">
	<head>

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
						<h2>Videos</h2>
					
					</header>

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Nuevo Video</h2>
							</header>
                            <form id="form" class="form-horizontal form-bordered" action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data">
							<div class="panel-body">
                            	<div style="margin-bottom:10px;">
									<a href="video.php" class="mb-xs mt-xs mr-xs btn btn-default"><li class="fa fa-arrow-circle-o-left"></li> Regresar</a>
									
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
												<label class="col-md-3 control-label" for="inputDefault">Titulo</label>
												<div class="col-md-6">
													<input name="titulo" type="text" class="form-control" id="titulo" title="Ingresa el titulo del album."  required  onkeyup="fAgrega();">
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">SEO URL</label>
												<div class="col-md-6">
													<input name="seo" type="text" class="form-control" id="seo" title="Ingresa un contenido SEO URL."  required>
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDisabled">Contenido</label>
												<div class="col-md-6">
													<textarea name="contenido" class="form-control" rows="3" id="contenido" data-plugin-textarea-autosize="" style="oordenflow: hidden; word-wrap: break-word; resize: none; height: 74px;"></textarea>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="inputDisabled">Variable Youtube</label>
												<div class="col-md-6">
													<textarea name="embed" class="form-control" rows="3" id="embed" data-plugin-textarea-autosize="" style="oordenflow: hidden; word-wrap: break-word; resize: none; height: 74px;"></textarea>
												</div>
											</div>
											
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Estado del video</label>
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


	</body>
</html>