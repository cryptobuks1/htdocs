<?php include("restringir.php"); ?>

<?php include("acentos.php"); ?>

<?php include("funciones.php"); ?>

<?php



$editFormAction = $_SERVER['PHP_SELF'];

if (isset($_SERVER['QUERY_STRING'])) {

  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);

}



if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

	

	$codigounico = date("ymd-His");

	

	if($_FILES['ima']['name']==""){

		$varimagen = $_POST['imagen'];

	} else {

		$varimagen = "ALBUM-".$codigounico.$_FILES['ima']['name'];

		}

				

  $updateSQL = sprintf("UPDATE tbl_perfil SET  imagen=%s, detalle1=%s, detalle2=%s WHERE id=%s",
						 GetSQLValueString($varimagen, "text"),
						  GetSQLValueString($_POST['detalle1'], "text"),
						   GetSQLValueString($_POST['detalle2'], "text"),
					     GetSQLValueString($_POST['id'], "int"));

  

  

  if($_FILES['ima']['name']!= ""){

		copy($_FILES['ima']['tmp_name'],"../images/about/ALBUM-".$codigounico.$_FILES['ima']['name']); 

		 $dim = getimagesize("../images/about/ALBUM-".$codigounico.$_FILES['ima']['name']);

		 

		 if($dim[0]>=500){

				

				

  						$thumb1=new thumbnail("../images/about/ALBUM-".$codigounico.$_FILES['ima']['name']); 

					    $thumb1->size_width(500);

					    $thumb1->jpeg_quality(90);

					    $thumb1->save("../images/about/ALBUM-".$codigounico.$_FILES['ima']['name']);

				

		 }

 	}



  mysql_select_db($database_admin, $admin);

  $Result1 = mysql_query($updateSQL, $admin) or die(mysql_error());



  $updateGoTo = "post.php";

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
$query_editar = sprintf("SELECT * FROM tbl_album WHERE id = %s", GetSQLValueString($colname_editar, "int"));
$editar = mysql_query($query_editar, $admin) or die(mysql_error());
$row_editar = mysql_fetch_assoc($editar);
$totalRows_editar = mysql_num_rows($editar);


mysql_select_db($database_admin, $admin);
$query_perfil = "SELECT * FROM tbl_perfil ORDER BY id ASC";
$perfil = mysql_query($query_perfil, $admin) or die(mysql_error());
$row_perfil = mysql_fetch_assoc($perfil);
$totalRows_perfil = mysql_num_rows($perfil);

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

						<h2>Perfil</h2>

					

					</header>



						<section class="panel">

							<header class="panel-heading">

														

								<h2 class="panel-title">Editar Perfil</h2>

							</header>

                            <form id="form" class="form-horizontal form-bordered" action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data">

							<div class="panel-body">

                            	

								<div>

											<div class="validation-message">

											<ul></ul>

											</div>


											 <div class="form-group">
												<label class="col-md-2 control-label">Columna 1</label>
												<div class="col-md-9">
                                                	
													<textarea class="input-block-level" id="summernote" name="detalle1" rows="18">
                                                   <?php echo $row_perfil['detalle1']; ?>
													</textarea>
                                                    <script type="text/javascript">
													var detalle1 = CKEDITOR.replace( 'detalle1' );
													CKFinder.setupCKEditor( detalle1, 'ckfinder/' ) ;
													</script>
												</div>
											</div>

                                            <div class="form-group">

												<label class="col-md-3 control-label" for="inputDefault">Imagen Actual</label>

												<div class="col-md-6">

													<div class="post-image">

												<div class="img-thumbnail">

													

														<a><img src="../images/about/<?php echo $row_perfil['imagen']; ?>" alt="" width="300"></a>

													

												</div>

											</div>

												</div>

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

																<input name="ima" type="file" />

															</span>

															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>

														</div>

													</div>

                                                    <span class="help-block">Tamaño de imagen: 500 Px Ancho mínimo</span>

												</div>

											</div>

						

									

                                            

                                            

						
 <div class="form-group">
												<label class="col-md-2 control-label">Columna 2</label>
												<div class="col-md-9">
                                                	
													<textarea class="input-block-level" id="summernote" name="detalle2" rows="18">
                                                   <?php echo $row_perfil['detalle2']; ?>
													</textarea>
                                                    <script type="text/javascript">
													var detalle2 = CKEDITOR.replace( 'detalle2' );
													CKFinder.setupCKEditor( detalle2, 'ckfinder/' ) ;
													</script>
												</div>
											</div>
											

											

										

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

							<input type="hidden" name="id" value="<?php echo $row_perfil['id']; ?>" />

                            <input name="imagen" type="hidden" id="imagen" value="<?php echo $row_perfil['imagen']; ?>" />

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