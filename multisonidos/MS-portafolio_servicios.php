<?php session_start();
$mipagina = "index";
spl_autoload_register(function ($clase) {
    include 'Administer/class/'.$clase.'/'.$clase.'.php';
});

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Servicios :: Grupo de Emprendedores</title>
    <link rel="shortcut icon" href="favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!-- bxslider -->
<link type="text/css" rel='stylesheet' href="js/bxslider/jquery.bxslider.css">
<!-- End bxslider -->
<!-- flexslider -->
<link type="text/css" rel='stylesheet' href="js/flexslider/flexslider.css">
<!-- End flexslider -->

<!-- bxslider -->
<link type="text/css" rel='stylesheet' href="js/radial-progress/style.css">
<!-- End bxslider -->

<!-- Animate css -->
<link type="text/css" rel='stylesheet' href="css/animate.css">
<!-- End Animate css -->

<!-- Bootstrap css -->
<link type="text/css" rel='stylesheet' href="css/bootstrap.min.css">
<link type="text/css" rel='stylesheet' href="js/bootstrap-progressbar/bootstrap-progressbar-3.2.0.min.css">
<!-- End Bootstrap css -->

<!-- Jquery UI css -->
<link type="text/css" rel='stylesheet' href="js/jqueryui/jquery-ui.css">
<link type="text/css" rel='stylesheet' href="js/jqueryui/jquery-ui.structure.css">
<!-- End Jquery UI css -->

<!-- Fancybox -->
<link type="text/css" rel='stylesheet' href="js/fancybox/jquery.fancybox.css">
<!-- End Fancybox -->

<link type="text/css" rel='stylesheet' href="fonts/fonts.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<link type="text/css" data-themecolor="default" rel='stylesheet' href="css/main-cyan.css">

<link type="text/css" rel='stylesheet' href="js/rs-plugin/css/settings.css">
<link type="text/css" rel='stylesheet' href="js/rs-plugin/css/settings-custom.css">
<link type="text/css" rel='stylesheet' href="js/rs-plugin/videojs/video-js.css">
</head>
<body>
<div class="mask-l" style="background-color: #fff; width: 100%; height: 100%; position: fixed; top: 0; left:0; z-index: 9999999;"></div> <!--removed by integration-->
<?php include("MS-cabezote.php");
if(isset($_GET['id'])){
    $pro=$producto->getByIdCat($_GET['id']);
}else{
    if(isset($_GET['criterio'])){
        $pro=$producto->getSearch($_GET['criterio']);
    }else {
        $catPro = $cat->getMembresia();
        $pro = $producto->getAllNot($catPro->id);
    }
}?>

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Servicios</h1>
    </div>
  </div>
</div>

<div class="l-main-container">
<div class="b-breadcrumbs f-breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
            <li><i class="fa fa-angle-right"></i><span> Búsqueda</span></li>
        </ul>
    </div>
</div>
<div class="container ">
<div class="l-inner-page-container">
    <div class="row">
        <div class="col-md-12">
            <div class="b-category-filter b-category-filter--portfolio f-category-filter j-filter">
                <ul>
                    <li class="is-category-filter-active"><a data-filter="all" href="#">Resultados de búsqueda</a></li>
                </ul>
            </div>

            <div class="j-filter-content">
                <div class="b-col-default-indent">
                    <?php
                    foreach ($pro as $pr){
                        $valor=number_format($pr->valor, 2, ',', '.');?>
                        <div class="col-md-6 <?php echo $c->nombre ?>">
                            <div class="b-news-item b-news-item--medium-size f-news-item">
                                <div class="b-news-item__img view view-sixth ">
                                    <?php $img=$imagen->getByProd($pr->id);
                                    ?>
                                    <img data-retina src="Administer/public/img/<?php echo $img[0]->imagen ?>" alt=""/>
                                    <div class="b-item-hover-action f-center mask">
                                        <div class="b-item-hover-action__inner">
                                            <div class="b-item-hover-action__inner-btn_group">
                                                <!--<a href="#" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-heart"></i></a>-->
                                                <a class="b-btn f-btn b-btn-light f-btn-light info addCart"  data-cantidad="<?php echo 1 ?>" data-img="<?php echo $img[0]->imagen ?>" data-id="<?php echo $pr->id ?>" data-valor="<?php echo $pr->valor ?>" data-nombre="<?php echo $pr->name ?>">
                                                    <i class="fa fa-shopping-cart" ></i>

                                                </a>
                                                <a href="MS-shop_detail.php?id=<?php echo $pr->id ?>" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-news-item__info">
                                    <?php $cap=$cat->getById($pr->categoria)?>
                                    <div class="f-news-item__info_category f-uppercase"><i class="<?php echo $cap->img ?>"></i> <?php echo $cap->nombre ?></div>
                                    <a href="shop_detail.html" class="b-news-item__info_title-big f-news-item__info_title-big f-primary-b"><?php echo $pr->name ?></a>
                                    <div class="b-news-item__info_text f-news-item__info_text">
                                        <?php echo $pr->descripcion ?>
                                        <div class="b-btn f-btn b-right b-btn-sm-md f-btn-sm-md f-primary-b">
                                            <a href="GE-shop_detalle.php?id=<?php echo $pr->id ?>"><i class="fa fa-plus-circle"></i> Ver mas</a>
                                        </div>
                                    </div>
                                   <!-- <div class="b-news-item__article b-color-picker b-news___color-picker f-news___color-picker f-uppercase">
                                        <span class="f-news___color-picker_title">Para:</span>
                                        <?php $clasificacion=new Clasificacion($con);
                                        $clas=$clasificacion->getAll();?>
                                        <div class="b-color-picker__box">
                                            <?php foreach ($clas as $cl){?>
                                                <div class="b-btn f-btn b-btn-light f-btn-light button-gray is-active"><i class=" <?php echo $cl->icono ?>"></i></div>

                                            <?php } ?>
                                        </div>
                                    </div>-->
                                    <?php
                                    if($cap->nombre=='Membresias'){
                                        $options=new Options($con);
                                        $dolar=$options->getByName('valor_dolar');?>
                                        <form action="GE-procesar-membresia.php" method="post" class="formPago">
                                            <input type="hidden" class="des" name="des" >
                                            <input type="hidden" class="cupon" name="cupon" >
                                            <input type="hidden" name="dolar" value="<?php echo $dolar->valor ?>" >
                                            <input type="hidden" name="producto" class="producto"  value="<?php echo $pr->name  ?>">
                                            <input type="hidden" name="img" class="img"  value="<?php echo $img[0]->imagen  ?>">
                                            <input type="hidden" name="idpro" class="idpro"  value="<?php echo $pr->id  ?>">
                                            <input type="hidden" name="precio" value="<?php echo $pr->valor  ?>">
                                            <div class="f-primary-b b-title-b-hr f-title-b-hr b-null-top-indent">Forma de pago</div>
                                            <div class="b-shortcode-example">
                                                <div class="checkbox">
                                                    <label><input type="radio"   name="metodoPago" checked value="payu">
                                                        <strong>Payu</strong></label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="radio"  name="metodoPago" value="paypal"> <strong>PayPal</strong></label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="radio"  name="metodoPago" value="deposito"> <strong>Deposito bancario</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="b-product-card__info_row pull-right">
                                                        <span class="f-news-item__price f-primary-b b-left">$ <span class="valor" data-valor="<?php echo $pr->valor ?>"><?php echo $valor ?></span>  </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button name="submit" class="b-btn f-btn b-btn-sm-md f-btn-sm-md btn-anadir">Pagar <i class="fas fa-arrow-right"></i></button>

                                                </div>
                                            </div>
                                        </form>
                                    <?php }else{?>
                                    <div class="b-news-item__article">
                                        <span class="f-news-item__price f-primary-b b-left">$ <?php echo $valor ?></span>
                                        <input type="hidden" class="cantidad" value="1">
                                        <div class="b-btn f-btn b-right b-btn-sm-md f-btn-sm-md f-primary-b button-xs addCart" data-img="<?php echo $img[0]->imagen ?>" data-modi="modi" data-idclasif="0" data-id="<?php echo $pr->id ?>" data-valor="<?php echo $pr->valor ?>" data-nombre="<?php echo $pr->name ?>">
                                            <div class="cargando hidden"><i class="fa fa-spinner fa-pulse"></i></div>
                                            añadir  <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="b-action-info f-primary-b">
                                    <div class="b-action-info_text f-action-info_text">Nuevo</div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>



                        <div class="clearfix hidden-xs"></div>
                    </div>
            </div>
            <div class="b-default-top-indent b-remaining--max-box  b-remaining--full-width">
                <div class="f-center b-remaining">
    <div class="b-hr-with-btn">
        <a class="b-btn b-btn--load f-btn b-btn-sm f-btn-load f-btn-sm f-primary-b"><i class="fa fa-spinner"></i> Load more</a>
    </div>
</div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


 <?php include("GE-pie.php"); ?>
 
<script src="js/breakpoints.js"></script>
<script src="js/jquery/jquery-1.11.1.min.js"></script>
<!-- bootstrap -->
<script src="js/scrollspy.js"></script>
<script src="js/bootstrap-progressbar/bootstrap-progressbar.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- end bootstrap -->
<script src="js/masonry.pkgd.min.js"></script>
<script src='js/imagesloaded.pkgd.min.js'></script>
<!-- bxslider -->
<script src="js/bxslider/jquery.bxslider.min.js"></script>
<!-- end bxslider -->
<!-- flexslider -->
<script src="js/flexslider/jquery.flexslider.js"></script>
<!-- end flexslider -->
<!-- smooth-scroll -->
<script src="js/smooth-scroll/SmoothScroll.js"></script>
<!-- end smooth-scroll -->
<!-- carousel -->
<script src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
<!-- end carousel -->
<script src="js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="js/rs-plugin/videojs/video.js"></script>

<!-- jquery ui -->
<script src="js/jqueryui/jquery-ui.js"></script>
<!-- end jquery ui -->
<script type="text/javascript" language="javascript"
        src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyCfVS1-Dv9bQNOIXsQhTSvj7jaDX7Oocvs"></script>
<!-- Modules -->
<script src="js/modules/sliders.js"></script>
<script src="js/modules/ui.js"></script>
<script src="js/modules/retina.js"></script>
<script src="js/modules/animate-numbers.js"></script>
<script src="js/modules/parallax-effect.js"></script>
<script src="js/modules/settings.js"></script>
<script src="js/modules/maps-google.js"></script>
<script src="js/modules/color-themes.js"></script>
<!-- End Modules -->

<!-- Audio player -->
<script type="text/javascript" src="js/audioplayer/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="js/audioplayer/js/jplayer.playlist.min.js"></script>
<script src="js/audioplayer.js"></script>
<!-- end Audio player -->

<!-- radial Progress -->
<script src="js/radial-progress/jquery.easing.1.3.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/d3/3.4.13/d3.min.js"></script>
<script src="js/radial-progress/radialProgress.js"></script>
<script src="js/progressbars.js"></script>
<!-- end Progress -->

<!-- Google services -->
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart']}]}"></script>
<script src="js/google-chart.js"></script>
<!-- end Google services -->
<script src="js/j.placeholder.js"></script>

<!-- Fancybox -->
<script src="js/fancybox/jquery.fancybox.pack.js"></script>
<script src="js/fancybox/jquery.mousewheel.pack.js"></script>
<script src="js/fancybox/jquery.fancybox.custom.js"></script>
<!-- End Fancybox -->
<script src="js/user.js"></script>
<script src="js/timeline.js"></script>
<script src="js/fontawesome-markers.js"></script>
<script src="js/markerwithlabel.js"></script>
<script src="js/cookie.js"></script>
<script src="js/loader.js"></script>
<script src="js/scrollIt/scrollIt.min.js"></script>
<script src="js/modules/navigation-slide.js"></script>
<!-- Font Awesome(iconos) -->
<?php include 'footer.php'; ?>

</body>
</html>
