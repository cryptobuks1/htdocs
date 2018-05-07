<?php include("restringir.php"); ?>
<?php include("acentos.php"); ?>
<?php include("funciones.php"); ?>
<?php
$varmenu="catalogo";

mysql_select_db($database_admin, $admin);
$query_ver = "SELECT * FROM tbl_productos_cat WHERE estado = '1' ORDER BY orden ASC";
$ver = mysql_query($query_ver, $admin) or die(mysql_error());
$row_ver = mysql_fetch_assoc($ver);
$totalRows_ver = mysql_num_rows($ver);
?>
<!doctype html>
<html class="fixed">
	<head>

	<?php include("llamadoshead.php"); ?>
	<style type="text/css">
	.ordendiv ul{
		list-style:none;
		margin:0;
		padding:0
	}
	.ordendiv ul li{
		display:block;
		background:#F5F5F5;
		border:1px solid #EFEFEF;
		color:#3594C4;
		margin-top:10px;
		height:auto;
		padding:10px;
		border-radius:7px;
	}
	.ui-state-highlight{ background:#FFF0A5; border:1px solid #FED22F}
	.msg{
		color:#0C0;
		font:normal 11px Tahoma
	}
</style>

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

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Definir Orden de Categorías</h2>
							</header>
							<div class="panel-body">
                            	<div style="margin-bottom:10px;">
									<a href="catalogo_categorias.php" class="mb-xs mt-xs mr-xs btn btn-default"><li class="fa fa-arrow-circle-o-left"></li> Regresar</a>
								</div>
                                <p>Arrastrar los elementos para definir el orden deseado.</p>
								<div class="msg"></div>
                                <div class="ordendiv" >
                                <ul id="ordenar" class="simple-post-list">
										<?php do{ ?>
										<li id="registro-<?php echo $row_ver['id'] ?>">
											
											<div class="post-info">
												<?php echo $row_ver['nombre']; ?>
												<div class="post-meta">
													 <?php echo $row_ver['des']; ?>
												</div>
											</div>
										</li>
                                        <?php } while ($row_ver = mysql_fetch_assoc($ver)); ?>	
									</ul>
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
        <script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		
		<script src="assets/javascripts/ui-elements/examples.notifications.js"></script>
        
        <script type="text/javascript">
	$(document).ready(function(){
		$("ul#ordenar").sortable({ placeholder: "ui-state-highlight",opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize");
			$.post("catalogo_categorias_order.php", order, function(respuesta){
				$(".msg").html(respuesta).fadeIn("fast").fadeOut(2500);
			});
		}
		});
	});</script>


	</body>
</html>