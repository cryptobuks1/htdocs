<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>New Age - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="lib/device-mockups/device-mockups.min.css">

    <!-- Theme CSS -->
    <link href="css/new-age.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll titulolanding" href="#page-top">Suscripción online</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#obligatorios">Datos obligatorios</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#otros">Otros datos</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#facturacion">Facturación</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#enviar">Proceso de pago</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="container" id="obligatorios">

            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-5">

                    <div class="header-content">
                        <div class="header-content-inner">
                            <h2 class="section-heading">Formulario de suscripción </h2>
                            <p>Datos Obligatorios</p>
                            <form action="pago.php" method="_POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nombre completo *" id="name" required data-validation-required-message="Por favor ingrese su nombre completo">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group tel">
                                    <select name="tipodocf" class="form-control ">
                                            <option >C.C.</option>
                                            <option >C.E.</option>
                                            <option >NIT</option>
                                            <option >Pasaporte</option>
                                            <option >Otro</option>
                                    </select>
                                </div>
                                <div class="form-group celu">
                                    <input type="text" class="form-control" placeholder="Número de identificación *" id="identi" required data-validation-required-message="Por favor ingrese su número de documento.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            
                                
                                <div class="form-group celu">
                                    <input type="tel" class="form-control" placeholder="Teléfono celular *" id="celular" required data-validation-required-message="Por favor ingrese su número celular.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group tel">
                                    <input type="tel" class="form-control" placeholder="Teléfono fijo *" id="telefono" required data-validation-required-message="Por favor ingrese su número de teléfono.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="mail" class="form-control" placeholder="Correo electrónico *" id="mail" required data-validation-required-message="Por favor ingrese un correo valido.">
                                    <p class="help-block text-danger"></p>
                                </div>

                       

                              
                        </div>
                    </div>
                    <div class="center">
                        <div class="arrow"></div>
                    </div> 
                </div>
                <div class="col-sm-1">
                </div>
                <div class="col-sm-5">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="img/demo-screen-1.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="otros" class="download bg-primary text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                        <p class="titlep">Ingrese datos si esta trabajando</p>
                        <div class="form-group celu">
                            <input type="text" class="form-control" placeholder="Nombre empresa" id="empresa" >
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group tel">
                            <input type="text" class="form-control" placeholder="Cargo" id="cargo" >
                            <p class="help-block text-danger"></p>
                        </div>
                            
                        <p class="titlep">Lugar de envio de las revistas</p>
                        <label class="leyenda">Advertencia: Los precios dados son para envíeos de revistas impresas en Colombia - Suramérica; si el envíeo se hará a otro lugar
                        diferente de este país, los costos de los fletes y demás ocasionados por este envío,serán calculados y facturados adicionalmente y una vez
                        se reciba el pago de estos costos adicionales, se procederá a el envío de el(los)ejemplar(es) objeto de esta suscripción.</label>
                        <div class="form-group celu">
                            <input type="text" class="form-control" placeholder="Dirección *" id="direccion" required data-validation-required-message="Por favor ingrese dirección de envio.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group tel">
                            <input type="text" class="form-control" placeholder="Código postal" id="postal" required data-validation-required-message="Por favor ingrese el código postal.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group celu">
                            <div class="selectContainer">
                                <?php
                                //$con=mysqli_connect("localhost","ingesoci_adminjl","aero3573","ingesoci_gpisoft");
                                $con=mysqli_connect("localhost","root","","ingesoci_gpisoft");
                                  // Check connection
                                  if (mysqli_connect_errno()){
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                  }

                                $result = mysqli_query($con,"SELECT * FROM gpipais ORDER BY GpaisPais ASC");?>
                                <select name="pais" class="form-control">
                                    <option value="">Seleccione país</option>
                                <?php while($row = mysqli_fetch_array($result)){?>
                                    <option value="<?php echo $row['GpaisPais']?>"><?php echo $row['GpaisPais']?></option>
                                <?php } 
                                mysqli_close($con);?>                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group tel">
                            <div class="selectContainer">
                                <?php
                                //$con=mysqli_connect("localhost","ingesoci_adminjl","aero3573","ingesoci_gpisoft");
                                $con=mysqli_connect("localhost","root","","ingesoci_gpisoft");
                                  // Check connection
                                  if (mysqli_connect_errno()){
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                  }

                                $result = mysqli_query($con,"SELECT * FROM ciudades ORDER BY ciudad ASC");?>
                                <select name="ciudad" class="form-control">
                                    <option value="">Seleccione ciudad</option>
                                <?php while($row = mysqli_fetch_array($result)){?>
                                    <option value="<?php echo$row['ciudad']?>"><?php echo $row['ciudad']?></option>
                                <?php } 
                                mysqli_close($con);?>                                   
                                </select>
                            </div>
                        </div>

                        <p class="titlep">Tipo de suscripción</p>
                        <div class="form-group celu">
                            <label class="leyenda">Tiene Ud un código especial de activación de renovación? Introduzcalo aqui.</label>
                            <input type="text" class="form-control" placeholder="Cargo" id="cargo" >
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group tel radio form-group-re">
                            <label><input type="radio" name="tiposus" value="" checked>Renovación</label>
                        </div>
                        <p class="titlep">Tipo de producto</p>
                        <div class="form-group form-group-rc">
                            <div class="radio tipodoc">
                                <label><input type="radio" name="tipopro" value="" >Revista impresa</label>
                            </div>
                            <div class="radio tipodoc">
                                <label><input type="radio" name="tipopro" value="" >Revista digital</label>
                            </div>
                            
                        </div>
                         <p class="titlep">Revista(s) de su interes</p>
                        <div class="form-group form-group-rc">
                            <div class="checkbox tipodoc">
                                <label><input type="checkbox" name="ingesocio" value="" >Revista Ingesocios (5 ediciones)</label>
                            </div>
                            <div class="checkbox tipodoc">
                                <label><input type="checkbox" name="construye" value="" >Revista Construye Metal (5 ediciones)</label>
                            </div>
                            
                        </div>
                        <p class="titlep">Como desea recibir su factura</p>
                        <div class="form-group form-group-rc">
                            <div class="radio tipodoc">
                                <label><input type="radio" name="tipopro" value="" >Impresa y por correo certificado<label class="leyenda">Nota: El envio tiene costos adicionales</label></label>
                            </div>
                            <div class="radio tipodoc">
                                <label><input type="radio" name="tipopro" value="" >Digital y enviada por correo electrónico</label>
                            </div>
                            
                        </div>
                        <p class="titlep ">Moneda en la que hace la transacción</p>
                        <div class="form-group form-group-rc">
                            <div class="radio tipodoc">
                                <label><input type="radio" name="moneda" value="" >Pesos Colombianos (COP)</label>
                            </div>
                            <div class="radio tipodoc">
                                <label><input type="radio" name="moneda" value="" >Dolares Americanos (USA)</label>
                            </div>
                        </div>
                        <p class="titlep">Forma de pago</p>
                        <div class="form-group form-group-rc">
                            <div class="radio tipodoc">
                                <label><input type="radio" name="tipopro" value="" >Pago en linea Payu</label>
                            </div>
                            <div class="radio tipodoc">
                                <label><input type="radio" name="tipopro" value="" >Transferencia bancaria</label>
                            </div>
                            
                        </div>
                        <p id="facturacion">Datos de facturación</p>
                        <div class="form-group celu">
                            <input type="text" class="form-control" placeholder="Nombre completo *" id="name" required data-validation-required-message="Por favor ingrese su nombre completo">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group tel">
                            <input type="mail" class="form-control" placeholder="Correo electrónico *" id="mail" required data-validation-required-message="Por favor ingrese un correo valido.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group tel">
                             <select name="tipodocf" class="form-control ">
                                    <option >C.C.</option>
                                    <option >C.E.</option>
                                    <option >NIT</option>
                                    <option >Pasaporte</option>
                                    <option >Otro</option>
                            </select>
                        </div>
                        <div class="form-group celu">
                            <input type="text" class="form-control" placeholder="Número de identificación *" id="identi" required data-validation-required-message="Por favor ingrese su número de documento.">
                            <p class="help-block text-danger"></p>
                        </div>
                    
                        
                        <div class="form-group celu">
                            <input type="tel" class="form-control" placeholder="Teléfono celular *" id="celular" required data-validation-required-message="Por favor ingrese su número celular.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group tel">
                            <input type="tel" class="form-control" placeholder="Teléfono fijo *" id="telefono" required data-validation-required-message="Por favor ingrese su número de teléfono.">
                            <p class="help-block text-danger"></p>
                        </div>
                </div>
               
               
                <div class="col-md-4">
                    <div class="cart-sidebar" id="enviar">
                        <div class="cart-ordersum-pod">
                            <div id="cart-subtotal-wrapper" style="border-bottom: 1px solid rgba(0,0,0,0.2);">
                                <div id="cart-subtotal-row">
                                    <span class="cart-subtext-h2 floatLeft" style="color:#333;">Subtotal</span>
                                    <span class="floatRight b">$109.666</span>
                                </div>
                                <div id="cart-taxfees-row" class="cboth">
                                    <span class="cart-subtext-h2 floatLeft cart-feesandtaxes-text sf-tipper-target">Envio revista</span>
                                    <span class="floatRight cart-feesandtaxes-value">$1.132</span>
                                </div>
                                <div id="cart-taxfees-row" class="cboth">
                                    <span class="cart-subtext-h2 floatLeft cart-feesandtaxes-text sf-tipper-target">Envio factura</span>
                                    <span class="floatRight cart-feesandtaxes-value">$1.132</span>
                                </div>
                            </div>
                            <div class="cart-os-payment-total padTop20 borderbottom1px">
                                <span style="text-align: center">
                                    <span id="cart-total-text" class="cart-subtext-h2">Total</span><br>
                                    <span style="font-weight: bold;font-size:12px;color:#333;">(COP)</span>
                                </span>
                                <span class="cart-subtotal-h1" style="padding:0;">$110.798</span>
                                <span id="cart-total-stretch"></span>
                            </div>
                            <input type="submit" id="cart-os-btn-submit" class="button-submit cart-btn-action cart-os-btn-submit" value="Proceso de pago">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; 2016 Start Bootstrap. All Rights Reserved.</p>
            <ul class="list-inline">
                <li>
                    <a href="#">Privacy</a>
                </li>
                <li>
                    <a href="#">Terms</a>
                </li>
                <li>
                    <a href="#">FAQ</a>
                </li>
            </ul>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="lib/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/new-age.min.js"></script>

</body>

</html>
