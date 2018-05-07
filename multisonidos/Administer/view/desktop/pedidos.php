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
	$pedido=new Pedido($cone);
	$pedidos=$pedido->getAll();
	$usuario=new User($cone);
    if(isset($_GET['id'])){
        $id=$_GET["id"];


        header('location:pedidos.php');
    }
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

                            <div class="container-fluid">
                                <!-- Breadcrumbs-->
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php"><i class="fas fa-home"></i> Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item active">Pedidos</li>

                                </ol>

                                <!-- Example DataTables Card-->
                                <div class="card mb-3 mt-1">
                                    <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                    <tr>
                                                        <th>No. pedido</th>
                                                        <th>Fecha</th>
                                                        <th>Metodo de pago</th>
                                                        <th>Ciudad</th>
                                                        <th>Cliente</th>
                                                        <th>Valor</th>
                                                        <th>Estado</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>No. pedido</th>
                                                        <th>Fecha</th>
                                                        <th>Metodo de pago</th>
                                                        <th>Ciudad</th>
                                                        <th>Cliente</th>
                                                        <th>Valor</th>
                                                        <th>Estado</th>
                                                        <th></th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php
                                                        if(count($pedidos)>0) {
                                                            foreach ($pedidos as $p) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $p->id ?></td>
                                                                    <td><?php echo $p->fecha." ".$p->hora ?> </td>                                                                   </td>
                                                                    <td><?php echo $p->metodoPago ?></td>
                                                                    <td><?php echo $p->ciudad ?></td>
                                                                    <td><?php
                                                                        $user=$usuario->getById($p->cliente);
                                                                        echo $user->nombre; ?></td>
                                                                    <td>$  <?php echo $p->total ?>
                                                                    </td>

                                                                    <td><?php
                                                                        switch($p->estado){
                                                                            case 0:
                                                                                echo '<div class="btn btn-danger estado" data-toggle="tooltip" title="Pedido pendiente"><a href="../../controller/cambioEstado.php?id='.$p->id.'&estado=0" class="text-white">P</a></div>
                                                                                <div class="btn btn-default estado" data-e="1" data-toggle="tooltip" title="Pedido Despachado"><a href="../../controller/cambioEstado.php?id='.$p->id.'&estado=1" class="text-dark">D</a></div>
                                                                                <div class="btn btn-default estado" data-e="2" data-toggle="tooltip" title="Pedido Anulado"><a href="../../controller/cambioEstado.php?id='.$p->id.'&estado=2" class="text-dark">A</a></div>';
                                                                            break;
                                                                            case 1:
                                                                                echo '<div class="btn btn-default estado" data-e="0" data-toggle="tooltip" title="Pedido pendiente"><a href="../../controller/cambioEstado.php?id='.$p->id.'&estado=0" class="text-dark">P</a></div>
                                                                                <div class="btn btn-success estado" data-e="1" data-toggle="tooltip" title="Pedido Despachado"><a href="../../controller/cambioEstado.php?id='.$p->id.'&estado=1" class="text-white">D</a></div>
                                                                                <div class="btn btn-default estado" data-e="2" data-toggle="tooltip" title="Pedido Anulado"><a href="../../controller/cambioEstado.php?id='.$p->id.'&estado=2" class="text-dark">A</a></div>';
                                                                            break;
                                                                            case 2:
                                                                                echo '<div class="btn btn-default estado" data-e="0" data-toggle="tooltip" title="Pedido pendiente"><a href="../../controller/cambioEstado.php?id='.$p->id.'&estado=0" class="text-dark">P</a></div>
                                                                                <div class="btn btn-default estado"data-e="1"  data-toggle="tooltip" title="Pedido Despachado"><a href="../../controller/cambioEstado.php?id='.$p->id.'&estado=1" class="text-drak">D</a></div>
                                                                                <div class="btn btn-warning estado" data-e="2" data-toggle="tooltip" title="Pedido Anulado"><a href="../../controller/cambioEstado.php?id='.$p->id.'&estado=2" class="text-white">A</a></div>';
                                                                                break;
                                                                        }
                                                                        ?>

                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-danger btn-options"
                                                                           data-toggle="modal"
                                                                           data-target="#eliminarModal"
                                                                           title="Eliminar pedido"><i
                                                                                    class="fa fa-trash"></i></a>

                                                                        <a class="btn btn-warning btn-options"
                                                                           data-toggle="tooltip" title="Editar pedido"
                                                                           href="editPedido.php?id=<?php echo $p->id ?>">
                                                                            <i class="fas fa-eye"></i></a>
                                                                        <div class="modal fade" id="eliminarModal"
                                                                             tabindex="-1" role="dialog"
                                                                             aria-labelledby="eliminarModalLabel"
                                                                             aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title text-danger"
                                                                                            id="exampleModalLabel">
                                                                                            Eliminar Pedido</h5>
                                                                                        <button type="button"
                                                                                                class="close"
                                                                                                data-dismiss="modal"
                                                                                                aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        Esta seguro de eliminar el
                                                                                        pedido?
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">
                                                                                            Close
                                                                                        </button>
                                                                                        <a class="btn btn-danger btn-options"
                                                                                           data-toggle="tooltip"
                                                                                           title="Eliminar pedido"
                                                                                           href="pedidos.php?id=<?php echo $p->id ?>"><i
                                                                                                    class="fa fa-trash"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                        }else{ ?>
                                                            <tr><td colspan="8" align="center">No hay productos</td></tr>
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