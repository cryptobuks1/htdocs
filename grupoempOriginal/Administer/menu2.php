<?php include("restringir.php"); ?>
<?php include("acentos.php"); ?>
<?php include("funciones.php"); ?>
<?php
mysql_select_db($database_admin, $admin);
$query_ver = "SELECT * FROM menu2 WHERE tipo = '".$_GET['tipo']."' ORDER BY orden ASC";
$ver = mysql_query($query_ver, $admin) or die(mysql_error());
$row_ver = mysql_fetch_assoc($ver);
$totalRows_ver = mysql_num_rows($ver);

mysql_select_db($database_admin, $admin);
$query_tipo = "SELECT * FROM tbl_menu2 WHERE id = '".$_GET['tipo']."'";
$tipo = mysql_query($query_tipo, $admin) or die(mysql_error());
$row_tipo = mysql_fetch_assoc($tipo);
$totalRows_tipo = mysql_num_rows($tipo);



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
						<h2>Botones</h2>
					
					</header>

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Listado de Menús - <?php echo $row_tipo['titulo'] ?> <?php echo $row_tipo['contenido'] ?></h2>
							</header>
							<div class="panel-body">
                            	<div style="margin-bottom:10px;">
                                	<a href="menu_list.php" class="mb-xs mt-xs mr-xs btn btn-default">Regresar</a>
									<!--<a href="menu_nuevo.php?tipo=<?php echo $_GET['tipo']; ?>" class="mb-xs mt-xs mr-xs btn btn-default">Nuevo Banner</a> -->
									<a href="menu2_orden.php?tipo=<?php echo $_GET['tipo']; ?>" class="mb-xs mt-xs mr-xs btn btn-default">Definir Orden de´los botones</a>
								</div>
								<div class="table-responsive">
											<table class="table table-bordered mb-none">
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
														<td><?php echo $row_ver['titulo']; ?></td>
														<td><?php echo $row_ver['orden']; ?></td>
                                                        <td><?php if ($row_ver['estado']=="1"){ echo "Activo"; }  if ($row_ver['estado']=="0"){ echo "Suspendido"; } ?></td>
														<td>
                                                        <a href="menu2_editar.php?id=<?php echo $row_ver['id']; ?>&tipo=<?php echo $_GET['tipo']; ?>" class="mb-xs mt-xs mr-xs btn btn-sm btn-success"><i class="fa fa-pencil"></i> Editar</a>
                                                        <!--<a class="mb-xs mt-xs mr-xs btn btn-sm btn-danger modal-basic" href="#modalPrimary<?php echo $row_ver['id']; ?>"><i class="fa fa-trash-o"></i> Eliminar</a>-->
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
                                                                        <a class="btn btn-primary modal-confirm" href="banner_eliminar.php?id=<?php echo $row_ver['id']; ?>&tipo=<?php echo $_GET['tipo']; ?>">Confirmar</a>
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