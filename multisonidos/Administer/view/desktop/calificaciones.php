<?php
session_start();
spl_autoload_register(function ($clase) {
    include '../../class/'.$clase.'/'.$clase.'.php';
});
?>
<!doctype html>
<html class="fixed">
	<head>

	<?php include("../../llamadoshead.php");
	$cone=new Conexion();
	$calificacion=new Calificacion($cone);
	$user=new User($cone);
	$pro=new Producto($cone);
	$id=$_GET['id'];
	?>
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
                            <?php

                            if (!isset($param)){}else{?>

                                <div class="alert <?php echo $param['clase'] ?>">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong><?php echo $param['alert'].":"; ?></strong> <?php echo $param['ms'] ?>
                                </div>
                            <?php } ?>
                            <div class="container-fluid">
                                <!-- Breadcrumbs-->
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php"><i class="fas fa-home"></i> Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item active">Calificación</li>
                                    <li>
                                        <?php $p=$pro->getById($id); echo $p->name;?>
                                    </li>
                                </ol>

                                <!-- Example DataTables Card-->
                                <div class="card mb-3 mt-1">
                                    <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                    <tr>
                                                        <th>Usuario</th>
                                                        <th>Producto</th>
                                                        <th>Valoración</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Usuario</th>
                                                        <th>Producto</th>
                                                        <th>Valoración</th>
                                                        <th></th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php
                                                        $cal=$calificacion->getByIdProducto($id);
                                                        if(count($cal)>0) {
                                                            foreach ($cal as $c) {
                                                                ?>
                                                                <tr>
                                                                    <td class="w-10">
                                                                        <?php
                                                                        $u=$user->getById($c->user);
                                                                        echo $u->nombre ?>
                                                                    </td>
                                                                    <td><?php
                                                                        $p=$pro->getById($c->producto);
                                                                        echo $p->name ?></td>
                                                                    <td><?php echo $c->calificacion ?></td>
                                                                    <td>
                                                                        <a class="btn btn-danger btn-options"
                                                                           data-toggle="modal"
                                                                           data-target="#eliminarModal"
                                                                           title="Eliminar calificación"><i
                                                                                    class="fa fa-trash"></i></a>

                                                                        <div class="modal fade" id="eliminarModal"
                                                                             tabindex="-1" role="dialog"
                                                                             aria-labelledby="eliminarModalLabel"
                                                                             aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title text-danger"
                                                                                            id="exampleModalLabel">
                                                                                            Eliminar Calificación</h5>
                                                                                        <button type="button"
                                                                                                class="close"
                                                                                                data-dismiss="modal"
                                                                                                aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        Esta seguro de eliminar la
                                                                                        calificación?
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">
                                                                                            Close
                                                                                        </button>
                                                                                        <a class="btn btn-danger btn-options"
                                                                                           data-toggle="tooltip"
                                                                                           title="Eliminar calificacion"
                                                                                           href="calificaciones.php?id=<?php echo $c->id ?>"><i
                                                                                                    class="fa fa-trash"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                        }else{ ?>
                                                            <tr><td colspan="8" align="center">No hay calificaciones</td></tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table>
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

	</body>
</html>