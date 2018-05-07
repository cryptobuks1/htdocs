<?php include("restringir.php"); ?>
<?php include("acentos.php"); ?>
<?php include("funciones.php"); ?>
<?php
$varmenu="editor";


?>
<!doctype html>
<html class="fixed">
	<head>

	<?php include("llamadoshead.php"); ?>
	<link rel="stylesheet" href="assets/css/style.css">	
	<script>
var _BASE_URL = '<?php echo _BASE_URL; ?>';
var current_group_id = <?php echo $group_id; ?>;
</script>
	<script src="assets/js/jquery-1.9.1.min.js"></script>
		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
	
        <script src="assets/js/jquery.mjs.nestedSortable.js"></script>
		<script src="assets/js/menu.js"></script>
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
						<h2>Editor - Menu</h2>
					
					</header>

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Administrar Elementos</h2>
							</header>
							<div class="panel-body">

								<div class="row ">

										<div class="col-md-8">

											<div id="main">
												<ul id="menu-group">
													<?php foreach ((array)$menu_groups as $id => $title) : ?>
													<li id="group-<?php echo $id; ?>">
														<a href="<?php echo site_url('menu&amp;group_id=' . $id); ?>">
															<?php echo $title; ?>
														</a>
													</li>
													<?php endforeach; ?>
													<li id="add-group"><a href="<?php echo site_url('menu_group.add'); ?>" title="Add New Menu">+</a></li>
												</ul>
												<div class="clear"></div>

												<form method="post" id="form-menu" action="<?php echo site_url('menu.save_position'); ?>">
													<div class="ns-row" id="ns-header">
														<div class="ns-actions">Opciones</div>
														<div class="ns-class">Class</div>
														<div class="ns-url">URL</div>
														<div class="ns-title">Titulo</div>
													</div>
													<?php echo $menu_ul; ?>
													<div id="ns-footer">
														<button type="submit" class="button green small" id="btn-save-menu">Guardar Cambios</button>
													</div>
												</form>
											</div>

										</div>


										<div class="col-md-4">

											<section class="box">
												<h2 class="panel-title">Información</h2>
												<div>	
													<p>Arraste la lista de menu para reordenar, y haga Click en <b>Actualizar Menu</b> para guardar los cambios.</p>
													<p>Para agregar un nuevo item en el menu, use el siguiente formulario.</p>
													
												</div>
											</section>
											<section class="box">
												<h2 class="panel-title">Menu Actual</h2>
												<div>
													<span id="edit-group-input"><?php echo $group_title; ?></span>
													(ID: <b><?php echo $group_id; ?></b>)
													
												</div>
											</section>
											<section class="box">
												<h2 class="panel-title">Nuevo Item</h2>
												<div>
													<form id="form-add-menu" method="post" action="<?php echo site_url('menu.add'); ?>">
														<p>
															<label for="menu-title">Titulo</label>
															<input type="text" name="title" id="menu-title">
														</p>
														<p>
															<label for="menu-url">URL</label>
															<input type="text" name="url" id="menu-url">
														</p>
														<p>
															<label for="menu-class">Class</label>
															<input type="text" name="class" id="menu-class">
														</p>
														<p class="buttons">
															<input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
															<button id="add-menu" type="submit" class="button green small">Agregar Item</button>
														</p>
													</form>
												</div>
											</section>


										</div>
										
								</div>
                            	
								
							</div>
						</section>
					<!-- end: page -->
				</section>
			</div>

			
		</section>
		
	</body>
</html>