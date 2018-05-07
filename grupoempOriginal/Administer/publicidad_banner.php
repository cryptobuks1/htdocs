<?php include("restringir.php"); ?>
<?php include("acentos.php"); ?>
<?php include("funciones.php"); ?>
<?php
mysql_select_db($database_admin, $admin);
$query_ver2 = "SELECT * FROM tbl_publicidades WHERE id = '".$_GET['tipo']."' ORDER BY id ASC";
$ver2 = mysql_query($query_ver2, $admin) or die(mysql_error());
$row_ver2 = mysql_fetch_assoc($ver2);
$totalRows_ver2 = mysql_num_rows($ver2);

mysql_select_db($database_admin, $admin);
$query_ver = "SELECT * FROM tbl_publicidades_files WHERE codigo = '".$_GET['tipo']."' ORDER BY id ASC";
$ver = mysql_query($query_ver, $admin) or die(mysql_error());
$row_ver = mysql_fetch_assoc($ver);
$totalRows_ver = mysql_num_rows($ver);


$editFormAction = $_SERorden['PHP_SELF'];
if (isset($_SERorden['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERorden['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	
	$codigounico = date("ymd-His");
	
	$varimagen = "ADD-".$codigounico.$_FILES['archivo']['name'];
		
  $insertSQL = sprintf("INSERT INTO tbl_publicidades_files (titulo, codigo, archivo, estado, enlace) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['titulo'], "text"),
					   GetSQLValueString($_GET['tipo'], "text"),
					   GetSQLValueString($varimagen, "text"),
					   GetSQLValueString($_POST['estado'], "text"),
					   GetSQLValueString($_POST['enlace'], "text"));
					   
					   copy($_FILES['archivo']['tmp_name'],"../public/ADD-".$codigounico.$_FILES['archivo']['name']);
  
  mysql_select_db($database_admin, $admin);
  $Result1 = mysql_query($insertSQL, $admin) or die(mysql_error());

  $insertGoTo = "publicidad_banner.php?tipo=".$_GET['tipo'];
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
						<h2>Publicidades</h2>
					
					</header>

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Administrar Publicidades - <?php echo $row_ver2['titulo']; ?></h2>
							</header>
							<div class="panel-body">
                            	<div style="margin-bottom:10px;">
									<a href="publicidad_list.php" class="mb-xs mt-xs mr-xs btn btn-default">Regresar</a>
								</div>
                                
                                <form id="form" class="form-horizontal form-bordered" action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data">
                                	<div>
											<div class="validation-message">
											<ul></ul>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Titulo</label>
												<div class="col-md-6">
													<input name="titulo" type="text" class="form-control" id="titulo" title="Ingresa el titulo del anuncio."  required  >
                                                    
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Estado de Publicidad</label>
												<div class="col-md-6">
													<select class="form-control " name="estado" id="estado">
														<option value="1">Activo</option>
														<option value="2">Suspendido</option>
														
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
																<input name="archivo" type="file" title="Ingresa una imagen." required/>
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
                                                    <span class="help-block">Tamaño de imagen: Ingresar el tamaño de la publicidad segun el espacio asignado.</span>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Enlace</label>
												<div class="col-md-6">
                                                	<input name="enlace" type="text" class="form-control" id="enlace" title="Ingresa el enlace del anuncio."    >
												</div>
											</div>
											
                                             <div class="form-group">
												<div class="col-sm-9 col-sm-offset-3">
                                            	<input type="hidden" name="MM_insert" value="form1" />
                                                <input type="submit" value="Ingresar Registro"  class="btn btn-primary"/>
											</div>
											</div>
																			
											
										
										</div>
                                        
                                </form>
                                </div>
                                
                                <div class="panel-body">
								<div class="table-responsive" style="margin-top:25px;">
											<table class="table table-bordered mb-none">
												<thead>
													<tr>
														<th>ID</th>
														<th>Titulo</th>
                                                        <th>Estado</th>
														<th>Impresiones</th>
														<th>Opciones</th>
													</tr>
												</thead>
												<tbody>
                                                <?php do{ ?>
													<tr>
														<td><?php echo $row_ver['id']; ?></td>
														<td><?php echo $row_ver['titulo']; ?></td>
                                                        <td><?php if($row_ver['estado']==1){ echo "Activo"; } if($row_ver['estado']==2){ echo "Suspendido"; } ?></td>
														<td><?php echo $row_ver['impresiones']; ?></td>
														<td>
                                                        
                                                        <a href="publicidad_banner_editar.php?tipo=<?php echo $_GET['tipo']; ?>&id=<?php echo $row_ver['id']; ?>" class="mb-xs mt-xs mr-xs btn btn-sm btn-success"><i class="fa fa-pencil"></i> Editar</a> 
                                                        <a class="mb-xs mt-xs mr-xs btn btn-sm btn-danger modal-basic" href="#modalPrimary<?php echo $row_ver['id']; ?>"><i class="fa fa-trash-o"></i> Eliminar</a>
                                                        <div id="modalPrimary<?php echo $row_ver['id']; ?>" class="modal-block modal-block-primary mfp-hide">
                                                        <section class="panel">
                                                            <header class="panel-heading">
                                                                <h2 class="panel-title">Alerta</h2>
                                                            </header>
                                                            <div class="panel-body">
                                                                <div class="modal-wrapper">
                                                                    <div class="modal-icon">
                                                                        <i class="fa fa-question-circle"></i>
                                                                    </div>
                                                                    <div class="modal-text">
                                                                       
                                                                        <p>Estas seguro de eliminar este elemento?</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <footer class="panel-footer">
                                                                <div class="row">
                                                                    <div class="col-md-12 text-right">
                                                                        <a class="btn btn-primary modal-confirm" href="publicidad_banner_eliminar.php?tipo=<?php echo $_GET['tipo']; ?>&id=<?php echo $row_ver['id']; ?>">Confirmar</a>
                                                                        <a class="btn btn-default modal-dismiss">Cancelar</a>
                                                                    </div>
                                                                </div>
                                                            </footer>
                                                        </section>
                                                    </div> 
                                                           
                                                        </td>
													</tr>
												<?php } while ($row_ver = mysql_fetch_assoc($ver)); ?>	
												</tbody>
											</table>
										</div>
							</div>
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
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
        <script src="assets/vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>
        <script src="assets/javascripts/ui-elements/examples.modals.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
        <script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
		
        <script src="assets/javascripts/forms/examples.validation.js"></script>
	</body>
</html>