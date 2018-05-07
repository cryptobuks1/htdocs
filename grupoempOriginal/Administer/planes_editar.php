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
		$varimagen = "SLIDE-".$codigounico.$_FILES['ima']['name'];
		}
				
  $updateSQL = sprintf("UPDATE planes SET titulo=%s,  link=%s, target=%s, imagen=%s, estado=%s  WHERE id=%s",
                       GetSQLValueString($_POST['titulo'], "text"),                 
                       GetSQLValueString($_POST['link'], "text"),
                       GetSQLValueString($_POST['target'], "text"),
                       GetSQLValueString($varimagen, "text"),
					   GetSQLValueString($_POST['estado'], "text"),
                       GetSQLValueString($_POST['id'], "int"));
  
  if($_FILES['ima']['name']!=""){ copy ($_FILES['ima']['tmp_name'],"../img/planes/SLIDE-".$codigounico.$_FILES['ima']['name']); }

  mysql_select_db($database_admin, $admin);
  $Result1 = mysql_query($updateSQL, $admin) or die(mysql_error());

  $updateGoTo = "planes.php";
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
$query_editar = sprintf("SELECT * FROM planes WHERE id = %s", GetSQLValueString($colname_editar, "int"));
$editar = mysql_query($query_editar, $admin) or die(mysql_error());
$row_editar = mysql_fetch_assoc($editar);
$totalRows_editar = mysql_num_rows($editar);


mysql_select_db($database_admin, $admin);
$query_tipo = "SELECT * FROM tbl_planes WHERE id = '".$_GET['tipo']."'";
$tipo = mysql_query($query_tipo, $admin) or die(mysql_error());
$row_tipo = mysql_fetch_assoc($tipo);
$totalRows_tipo = mysql_num_rows($tipo);

mysql_select_db($database_admin, $admin);
$query_target = sprintf("SELECT * FROM target ORDER BY id ASC");
$target = mysql_query($query_target, $admin) or die(mysql_error());
$row_target = mysql_fetch_assoc($target);
$totalRows_target = mysql_num_rows($target);
?>
<!doctype html>
<html class="fixed">
	<head>

	<?php include("llamadoshead.php"); ?>
		<link rel="stylesheet" href="assets/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/theme/monokai.css" />

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
						<h2>Slider</h2>
					
					</header>

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Editar Plan - <?php echo $row_tipo['titulo'] ?> <?php echo $row_tipo['contenido'] ?></h2>
							</header>
                            <form id="form" class="form-horizontal form-bordered" action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data">
							<div class="panel-body">
                            	<div style="margin-bottom:10px;">
									<a href="planes.php?tipo=<?php echo $_GET['tipo']; ?>" class="mb-xs mt-xs mr-xs btn btn-default"><li class="fa fa-arrow-circle-o-left"></li> Regresar</a>
									
								</div>
								<div>
											<div class="validation-message">
											<ul></ul>
											</div>
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Imagen Actual</label>
												<div class="col-md-6">
													<div class="post-image">
												<div class="img-thumbnail">
													
														<a><img src="../img/planes/<?php echo $row_editar['imagen']; ?>" alt="" width="300"></a>
													
												</div>
											</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Contenido</label>
												<div class="col-md-6">
													<input name="titulo" type="text" class="form-control" id="titulo" title="Ingresa el titulo del banner."  required value="<?php echo $row_editar['titulo']; ?>">
												</div>
											</div>
						
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputReadOnly">Enlace</label>
												<div class="col-md-6">
													<input name="link" type="text" class="form-control" id="link" value="<?php echo $row_editar['link']; ?>">
												</div>
											</div>

												<div class="form-group">
												<label class="col-md-3 control-label" for="inputReadOnly">Cómo abrir el link:</label>
												<div class="col-md-6">
												<select id="target" name="target">

													<?php do{ ?>			
													<option value="<?php echo $row_target['valor']; ?>"><?php echo $row_target['titulo']; ?> 
													</option>																	
												<?php } while ($row_target = mysql_fetch_assoc($target)); ?> 

												
												</select>
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
                                                    <span class="help-block">Tamaño de imagen:  <?php echo $row_tipo['contenido'] ?></span>
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Estado del Plan</label>
												<div class="col-md-6">
													<select class="form-control mb-md" name="estado">
														<option value="1" <?php if($row_editar['estado']=="1"){ echo "selected"; } ?> >Activo</option>
														<option value="0" <?php if($row_editar['estado']=="0"){ echo "selected"; } ?> >Suspendido</option>
														
													</select>
						
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
		<script src="assets/vendor/codemirror/lib/codemirror.js"></script>
		<script src="assets/vendor/codemirror/addon/selection/active-line.js"></script>
		<script src="assets/vendor/codemirror/addon/edit/matchbrackets.js"></script>
		<script src="assets/vendor/codemirror/mode/javascript/javascript.js"></script>
		<script src="assets/vendor/codemirror/mode/xml/xml.js"></script>
		<script src="assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
		<script src="assets/vendor/codemirror/mode/css/css.js"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		
        <script src="assets/javascripts/forms/examples.validation.js"></script>


	</body>
</html>