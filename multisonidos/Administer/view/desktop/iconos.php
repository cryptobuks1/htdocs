<?php
session_start();
spl_autoload_register(function ($clase) {
    include '../../class/'.$clase.'/'.$clase.'.php';
});

?>
<!doctype html>
<html class="fixed">
	<head>
    <?php
    $ic=new Icono(new Conexion());
    $iconos=$ic->getAll();
    if(isset($_GET['id'])){
        $id=$_GET["id"];
        $ic->delete($id);
        header('location:iconos.php');

    }?>
    ?>
	<?php include("../../llamadoshead.php"); ?>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<?php include("../../header.php"); ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include("../../nav.php");?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Acceso Administrador</h2>

					</header>

						<section class="panel">

                            <div class="container-fluid">
                                <!-- Breadcrumbs-->
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php"><i class="fas fa-home"></i> Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item active">Iconos </li>
                                    <li>
                                        <div class="btn-group pb-2">
                                            <a type="button" class="btn btn-success" href="newIcono.php"><i class="fas fa-plus"></i> Nuevo icono</a>
                                        </div>
                                    </li>

                                </ol>
                                <!-- Example DataTables Card-->
                                <div class="card mb-3 mt-1">
                                    <?php
                                    if(!isset($ms)) {
                                        $ms = $pass = isset($_GET['ms']) ? $_GET['ms'] : '';
                                    }
                                    if (empty($ms)){}else{?>

                                        <div class="alert <?php echo $_GET['clase'] ?>">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <strong><?php echo $_GET['alert'].":"; ?></strong> <?php echo $ms ?>
                                            <a href="categorias.php" class="btn btn-primary pull-right cursor-pointer mr-1" >Finalizar</a>
                                        </div>
                                    <?php }?>
                                    <div class="card-body ">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group iconos">
                                                    <label><span class="text-label">*Icono</span><small> Seleccione un icono para la clasificación</small></label><br/>
                                                    <?php for($i=0; $i<count($iconos);$i++){?>
                                                        <label class="checkbox-inline">
                                                            <h3 class="icono"><i class="<?php echo $iconos[$i]->icon ?>" ></i>
                                                                <div class="row iconsi">
                                                                        <a href="iconos.php?id=<?php echo $iconos[$i]->id ?>" class="pull-left ml-2"><i class="fas fa-times" ></i> </a>
                                                                        <a href="editIcono.php?id=<?php echo $iconos[$i]->id ?>" class="pull-right mr-2"><i class="fas fa-edit" ></i></a>
                                                                </div>
                                                            </h3></label>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


						</section>
					<!-- end: page -->
				</section>
			</div>

			
		</section>

		<!-- Vendor -->

        <?php include("../../footer.php"); ?>
        <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('deslarga');
            CKEDITOR.replace('descorta',
                {
                    height:70
                });
        </script>


	</body>
</html>