<?php require('../../wp-blog-header.php');
global $user_login;
if($user_login){
include 'usuarios/config.php';
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de control Soy Imalero</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../less/estilosAdmin.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><img src="http://soyimalero.com/wp-content/uploads/2017/07/Landing-Page-Soy-Imalero.jpg"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Buscar...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-table fa-fw"></i> Usuarios</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <form action="usuarios/generarlistado.php" method="POST">
            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Usuarios</h1>
                    <button type="submit" class="btn btn-success right generar">Generar listado</button>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabla de datos
                            
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-check"></i></th>
                                        <th>Nombre</th>
                                        <th>Celular</th>
                                        <th>Correo</th>
                                        <th>Nacimiento</th>
                                        <th>Puntos</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                 <tbody class="usuariosTable">
                                    
                                    <?php 
                                    
                                    $peticion = "SELECT * FROM users";
                                    $resultado = mysqli_query($conexion, $peticion);
                                     while($fila = mysqli_fetch_array($resultado)){?>
                                    <tr class="odd gradeX">
                                        <td><input type="checkbox" checked class="idUser" name="id[]" value="<?php echo $fila['id_user']?>"></td>
                                        <td><?php echo $fila['nombre']?></td>
                                        <td><?php echo $fila['celular']?></td>
                                        <td><?php echo $fila['email']?></td>
                                        <td><?php echo $fila['nacimiento']?></td>
                                        <td><?php echo $fila['puntos']?></td>
                                        <td>
                                        <div class="btn-toolbar" role="toolbar"> 
                                            <div class="btn-group"> 
                                                <a  href="editar-user.php?id_user=<?php echo $fila['id_user'] ?>" type="button" class="btn btn-default " aria-label="Left Align"><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a> 
                                            </div> 
                                        </div>
                                        <div class="btn-toolbar" role="toolbar"> 
                                            <div class="btn-group"> 
                                                 <a  data-toggle="modal" data-target="#myModal"  type="button" class="btn btn-default eliminaruser" aria-label="Left Align"><i class="fa fa-close" aria-hidden="true"></i></a>
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Advertencia</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                          <p>Esta seguro que quiere eliminar el usuario?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a type="button" class="btn btn-danger btnEliminar" href="usuarios/borrar-user.php?id=<?php echo $fila['id_user'] ?>">Eliminar</a>
                                                          <button type="button" class="btn btn-success btnCerrarAd" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </td>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                        
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </form>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/compressed.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../js/sb-admin-2.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
<?php }else{?>
    <meta http-equiv="refresh" content="0;url=../../wp-admin/index.php">
<?php }  ?>