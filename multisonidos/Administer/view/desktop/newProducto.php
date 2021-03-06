<?php
session_start();
spl_autoload_register(function ($clase) {
    include '../../class/'.$clase.'/'.$clase.'.php';
});
$con=new Conexion();
$producto = new Producto($con);
$categoria=new Marca($con);
$cat=$categoria->getAll();
?>
<!doctype html>
<html class="fixed">
	<head>
    <?php
    if(isset($_POST['submit'])){
        $name= isset($_POST['name']) ? $_POST['name'] : '';
        $valor= isset($_POST['valor']) ? $_POST['valor'] : '';
        $descripcion= isset($_POST['descorta']) ? $_POST['descorta'] : '';
        if (empty($name) or empty($valor) or empty($descripcion)){
            $param=[
                    'ms'=>'Llene todos los campos con asterísco (obligatorio)',
                    'clase'=>'alert-danger',
                    'alert'=>'Error'
                    ];
            header('Location: newProducto.php?ms='.$param["ms"].'&clase='.$param["clase"].'&alert='.$param["alert"].'');
        }else {

            $labelEsp=$_POST['especificacion'];
            $valEsp=$_POST['valEsp'];
            $esp=array();
            for($i=0;$i<count($labelEsp);$i++){
                $e=array(
                        'especificacion'=>$labelEsp[$i],
                        'valor'=>$valEsp[$i]
                );
                array_push($esp, $e);
            }

            $espJason=json_encode($esp,JSON_FORCE_OBJECT);
            $producto->setName($name);
            $producto->setValor($valor);
            $producto->setDescripcion($descripcion);
            $producto->setDetalle($_POST['deslarga']);
            $producto->setCategoria($_POST['idCat']);
            $producto->setEsp($espJason);
            $producto->setStock($_POST['stock']);
            $resul = $producto->save();
            $param=[
                'ms'=>'Producto registrado exitosamente',
                'clase'=>'alert-success',
                'alert'=>'Exito'
            ];
            $pro=$producto->getUltimoRegistro();

           header('Location: editProducto.php?id='.$pro->id);

        }
    }
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
                                    <li class="breadcrumb-item active">Nuevo Producto</li>

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
                                            <a href="articulos.php" class="btn btn-primary pull-right cursor-pointer mr-1" >Finalizar</a>
                                        </div>
                                    <?php }?>
                                    <div class="card-body ">
                                        <form id="loginForm" action="newProducto.php" method="POST"  class="form-horizontal" >
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputUser"><span class="text-label">*Nombre del producto</span></label>
                                                        <input class="form-control" id="exampleInputUser" type="text" name="name" aria-describedby="usuario" placeholder="Nombre de usuario">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><span class="text-label">Categoría</span></label>
                                                        <select class="form-control" name="idCat" id="exampleFormControlSelect1">
                                                            <?php foreach ($cat as $a){?>
                                                            <option value="<?php echo $a->id ?>"><?php echo $a->nombre ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="exampleInputUser"><span class="text-label">*Stock</span></label>
                                                        <input class="form-control" type="text" name="stock" placeholder="Stock">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputName"><span class="text-label">*Valor</span></label>
                                                        <input class="form-control" id="exampleInputUser" type="text" name="valor" aria-describedby="usuario" placeholder="Nombre de usuario">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-7">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label><span class="text-label">Especificaciones </span></label>

                                                            <span class="mb-1"> Puede añadir campos de especificaciones</span>
                                                            <div class="row">

                                                                <div class="col-md-10">
                                                                    <div id="Add1" class="clonedInput">
                                                                        <input class="form-control float-left w-50" type="text" name="especificacion[]" id="name1" placeholder="Especificación" />
                                                                        <input class="form-control float-left w-50" type="text" name="valEsp[]" id="name1" placeholder="Escriba la especificaón del producto"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="btn-group pull-left">
                                                                        <a class="btn btn-success btn-xs btn-options" id="btnAdd"  data-toggle="tooltip" title="Añadir campo" ><i class="fas fa-plus"></i></a>
                                                                        <a class="btn btn-default btn-xs btn-options" id="btnDel" data-toggle="tooltip" title="Quitar campo" ><i class="fas fa-trash"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputName"><span class="text-label">*Descripción corta</span></label>
                                                        <textarea name="descorta" id="descorta" rows="3" cols="80">
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"><span class="text-label">Detalles</span></label>
                                                        <textarea name="deslarga" id="deslarga" rows="10" cols="80">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary btn-lg pull-right cursor-pointer" ><i class="fas fa-save"></i> Guardar</button>
                                        </form>

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