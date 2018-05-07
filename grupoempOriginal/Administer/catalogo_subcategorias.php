<?php include("restringir.php"); ?>
<?php include("acentos.php"); ?>
<?php include("funciones.php"); ?>
<?php
$varmenu="catalogo";

mysql_select_db($database_admin, $admin);
$query_ver1 = "SELECT * FROM tbl_productos_cat Where id = '".$_GET['cat']."' ORDER BY orden ASC";
$ver1 = mysql_query($query_ver1, $admin) or die(mysql_error());
$row_ver1 = mysql_fetch_assoc($ver1);
$totalRows_ver1 = mysql_num_rows($ver1);

mysql_select_db($database_admin, $admin);
$query_ver = "SELECT * FROM tbl_productos_cat Where parent = '".$_GET['cat']."' ORDER BY orden ASC";
$ver = mysql_query($query_ver, $admin) or die(mysql_error());
$row_ver = mysql_fetch_assoc($ver);
$totalRows_ver = mysql_num_rows($ver);
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
						<h2>Catalogo - SubCategorías - <?php echo $row_ver1['nombre']; ?></h2>
					
					</header>

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Listado de Subcategorías</h2>
							</header>
							<div class="panel-body">
                            	<div style="margin-bottom:10px;">
                            		<a href="catalogo_categorias.php" class="mb-xs mt-xs mr-xs btn btn-default">Regresar</a>
									<a href="catalogo_subcategorias_nuevo.php?cat=<?php echo $_GET['cat']; ?>" class="mb-xs mt-xs mr-xs btn btn-default">Nueva Subcategoría</a>
                                    <a href="catalogo_subcategorias_orden.php?cat=<?php echo $_GET['cat']; ?>" class="mb-xs mt-xs mr-xs btn btn-default">Definir Orden de Subcategorías</a>
								</div>
								<div class="table-responsive">
											<table class="table table-bordered mb-none" >
												<thead>
													<tr>
														<th>ID</th>
														<th>Titulo</th>
														<th>Orden</th>
                                                        <th>Estado</th>
														<th>Opciones</th>
													</tr>
												</thead>
												<tbody>
                                                <?php do{ ?>
													<tr>
														<td><?php echo $row_ver['id']; ?></td>
														<td><?php echo $row_ver['nombre']; ?></td>
														<td><?php echo $row_ver['orden']; ?></td>
                                                        <td><?php if ($row_ver['estado']=="1"){ echo "Activo"; }  if ($row_ver['estado']=="0"){ echo "Suspendido"; } ?></td>
														<td>                                                        
                                                        <a href="catalogo_categorias_editar.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $row_ver['id']; ?>" class="mb-xs mt-xs mr-xs btn btn-sm btn-success"><i class="fa fa-pencil"></i> Editar</a>
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
                                                                        <a class="btn btn-primary modal-confirm" href="catalogo_subcategorias_eliminar.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $row_ver['id']; ?>">Confirmar</a>
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
	</body>
</html>