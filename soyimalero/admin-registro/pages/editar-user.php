<?php  require('../../wp-blog-header.php');
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
                <a class="navbar-brand" href="index.html"><img src="http://soyimalero.com/wp-content/uploads/2017/07/Landing-Page-Soy-Imalero.jpg"></a>
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
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1 class="page-header">Edición</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="panel panel-default formularioregistro">
                        <form>
                        <div class="form-group">
                        <?php $peticion = "SELECT * FROM users WHERE id_user=".$_GET['id_user']." ";
                        $resultado = mysqli_query($conexion, $peticion);
                        while($fila = mysqli_fetch_array($resultado)){?>
                        <input id="id" class="form-control"   type="hidden" Value="<?php echo $fila['id_user'] ?>" />
                        <input id="name" class="form-control"   type="text" Value="<?php echo $fila['nombre'] ?>" placeholder="Nombre Completo *" data-validation-required-message="Por favor ingrese su nombre completo" />
                        <p class="help-block text-danger"></p>

                        </div>
                        <div class="form-group celu">

                        <input id="mail" class="form-control"   type="mail" Value="<?php echo $fila['email'] ?>" placeholder="Correo Electrónico *" data-validation-required-message="Por favor ingrese su número de documento." />
                        <p class="help-block text-danger"></p>

                        </div>
                        <div class="form-group celu">

                        <input id="fecha" class="form-control"   type="date" Value="<?php echo $fila['nacimiento'] ?>" placeholder="Fecha de Nacimiento *" data-validation-required-message="Por favor ingrese su número celular." />
                        <p class="help-block text-danger"></p>

                        </div>
                        <div class="form-group tel">

                        <input id="telefono" class="form-control"   type="tel" Value="<?php echo $fila['celular'] ?>" placeholder="Teléfono de Celular *" data-validation-required-message="Por favor ingrese su número de teléfono." />
                        <p class="help-block text-danger"></p>

                        </div>
                        <div class="form-group">

                        <input id="taller" class="form-control"   type="text" Value="<?php echo $fila['taller'] ?>" placeholder="Dirección Taller *" data-validation-required-message="Por favor ingrese un correo valido." />
                        <p class="help-block text-danger"></p>

                        </div>
                        <div class="form-group">

                        <input id="residencia" class="form-control"   type="text" Value="<?php echo $fila['residencia'] ?>" placeholder="Dirección Residencia *" data-validation-required-message="Por favor ingrese un correo valido." />
                        <p class="help-block text-danger"></p>

                        </div>
                        <div class="form-group">

                        <input id="ciudad" class="form-control"   type="text" Value="<?php echo $fila['ciudad'] ?>"  placeholder="Ingrese Ciudad *" data-validation-required-message="Por favor ingrese un correo valido." />
                        <p class="help-block text-danger"></p>

                        </div>
                        <div class="form-group">

                        <input id="puntos" class="form-control"   type="text" Value="<?php echo $fila['puntos'] ?>" data-validation-required-message="Por favor ingrese un correo valido." placeholder="Ingrese los Puntos acumulados" />
                        <p class="help-block text-danger"></p>

                        </div>
                        <div class="form-group">

                        <input id="facturas" class="form-control"   type="text" Value="<?php echo $fila['facturas'] ?>" data-validation-required-message="Por favor ingrese un correo valido." placeholder="Ingrese la factura separe con un guión (-) (5236-5698...)" />
                        <p class="help-block text-danger"></p>

                        </div>
                        <div class="form-group">
                        <?php switch($fila['enteraste']){
                            case'Amigo': 
                                echo "<div class='radio'><input name='enteraste'  checked class='enteraste' type='radio' value='Amigo' /><label>Amigo</label></div>
                                <div class='radio'><input name='enteraste'  class='enteraste' type='radio' value='Boletín' /><label>Boletín</label></div>
                                <div class='radio'><input name='enteraste'  class='enteraste' type='radio' value='Otro' /><label>Otro</label></div>";
                            break; 
                             case'Boletín': 
                                echo "<div class='radio'><input name='enteraste'class='enteraste' type='radio' value='Amigo' /><label>Amigo</label></div>
                                <div class='radio'><input name='enteraste'  checked   class='enteraste' type='radio' value='Boletín' /><label>Boletín</label></div>
                                <div class='radio'><input name='enteraste'  class='enteraste' type='radio' value='Otro' /><label>Otro</label></div>";
                            break; 
                             case'Otro': 
                                echo "<div class='radio'><input name='enteraste'class='enteraste' type='radio' value='Amigo' /><label>Amigo</label></div>
                                <div class='radio'><input name='enteraste'  class='enteraste' type='radio' value='Boletín' /><label>Boletín</label></div>
                                <div class='radio'><input name='enteraste'  checked class='enteraste' type='radio' value='Otro' /><label>Otro</label></div>";
                            break; 
                        }?>
                        <input id="otro"  class="form-control detenteraste" type="text" Value="<?php echo $fila['detenteraste'] ?>"/>
                        
                        </div>
                        <div>
                        <div class="form-group">
                        <div class="checkbox">
                        <div></div>
                        <div class="mensaje-respuesta"></div>
                        </div>
                        </div>
                        </div>
                        </div>
                        <?php } ?>
                        </form>
                        
                        <button class="btn btn-lg btn-primary btn-block enviarRegistro">Enviar</button>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

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
    
    <script src="../js/sb-admin-2.js"></script>
    <!-- Custom Theme JavaScript -->

    

</body>

</html>
<?php }else{?>
    <meta http-equiv="refresh" content="0;url=../../wp-admin/index.php">
<?php } ?>