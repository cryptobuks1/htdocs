<?php include("restringir.php"); ?>
<?php include("acentos.php"); ?>
<?php include("funciones.php"); ?>
<?php
mysql_select_db($database_admin, $admin);
$query_ver = "SELECT * FROM tbl_fotos WHERE album = '".$_GET['id']."' ORDER BY orden ASC";
$ver = mysql_query($query_ver, $admin) or die(mysql_error());
$row_ver = mysql_fetch_assoc($ver);
$totalRows_ver = mysql_num_rows($ver);

mysql_select_db($database_admin, $admin);
$query_veralbum = "SELECT * FROM tbl_album WHERE id = '".$_GET['id']."'";
$veralbum = mysql_query($query_veralbum, $admin) or die(mysql_error());
$row_veralbum = mysql_fetch_assoc($veralbum);
$totalRows_veralbum = mysql_num_rows($veralbum);
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
						<h2>Galería Fotográfica</h2>
					
					</header>

						<section class="content-with-menu content-with-menu-has-toolbar media-gallery">
						<div class="content-with-menu-container">
							<div class="inner-menu-toggle">
								<a href="#" class="inner-menu-expand" data-open="inner-menu">
									Ver Opciones <i class="fa fa-chevron-right"></i>
								</a>
							</div>
							
							<menu id="content-menu" class="inner-menu" role="menu">
								<div class="nano">
									<div class="nano-content">
							
										<div class="inner-menu-toggle-inside">
											<a href="#" class="inner-menu-collapse">
												<i class="fa fa-chevron-up visible-xs-inline"></i><i class="fa fa-chevron-left hidden-xs-inline"></i> Ocultar Opciones
											</a>
											<a href="#" class="inner-menu-expand" data-open="inner-menu">
												Ver Opciones <i class="fa fa-chevron-down"></i>
											</a>
										</div>
							
										<div class="inner-menu-content">
											<a class="btn btn-block btn-success btn-md pt-sm pb-sm text-md" href="album.php">
												<i class="fa fa-arrow-circle-left mr-xs"></i>
												Regresar
											</a>
											<a class="btn btn-block btn-primary btn-md pt-sm pb-sm text-md" href="album_add.php?id=<?php echo $_GET['id']; ?>">
												<i class="fa fa-picture-o mr-xs"></i>
												Cargar Fotos
											</a>
							
											<hr class="separator" />
							
											<div class="sidebar-widget m-none">
												<div class="widget-header clearfix">
													<h6 class="title pull-left mt-xs">DETALLE DE ALBUM</h6>
												</div>
												<div class="widget-content">
                                                	<div class="post-image">
                                                        <div class="img-thumbnail">
                                                                <a><img src="../public/<?php echo $row_veralbum['imagen']; ?>" style="width:100%;"></a>
                                                        </div>
                                                    </div>
                                                    <hr class="separator" />
													<ul class="mg-folders">
														<li><strong>Titulo de Album:</strong><br>
                                                        	<?php echo $row_veralbum['titulo']; ?>
														</li>
                                                        <hr class="separator" />
														<li><strong>Descripción:</strong><br>
                                                        	<?php echo $row_veralbum['contenido']; ?>
														</li>
                                                        <hr class="separator" />
                                                        <li><strong>Total de Fotos:</strong> <?php echo $totalRows_ver; ?>
														</li>
													</ul>
												</div>
											</div>
							
											<hr class="separator" />
							
											
										</div>
									</div>
								</div>
							</menu>
							<div class="inner-body mg-main" style="border-top-width:100px;">
							
								
								<div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
									
                                    <?php do{ if($row_ver['id']!="") { ?>
									<div class="isotope-item col-sm-6 col-md-4 col-lg-3">
										<div class="thumbnail">
											<div class="thumb-preview">
												<a class="thumb-image" href="../public/<?php echo $row_ver['imagen']; ?>">
													<img src="image.php?img=../public/<?php echo $row_ver['imagen']; ?>&w=350&h=350" class="img-responsive" alt="Project">
												</a>
												<div class="mg-thumb-options">
													<div class="mg-zoom"><i class="fa fa-search"></i></div>
													<div class="mg-toolbar">
														
														
													</div>
												</div>
											</div>
                                            <h5 class="mg-title text-semibold">
                                            <a href="album_fotoeditar.php?id=<?php echo $_GET['id']; ?>&ob=<?php echo $row_ver['id']; ?>"  >
																<i class="fa fa-pencil"></i>
															</a>
															<a href="album_fotoeliminar.php?id=<?php echo $_GET['id']; ?>&ob=<?php echo $row_ver['id']; ?>"  >
																<i class="fa fa-trash-o"></i>
															</a>
                                            </h5>
											
										</div>
									</div>
                                    <?php } } while ($row_ver = mysql_fetch_assoc($ver)); ?>
									
								</div>
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
		<script src="assets/vendor/isotope/jquery.isotope.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/pages/examples.mediagallery.js" /></script>
	</body>
</html>