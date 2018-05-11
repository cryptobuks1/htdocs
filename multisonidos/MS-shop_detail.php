<?php session_start();
    $mipagina = "producto";
    spl_autoload_register(function ($clase) {
        include 'Administer/class/'.$clase.'/'.$clase.'.php';
    });

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detalle de Producto | MULTISONIDO</title>
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
<?php include("MS-cabezote.php"); ?>

<div class="j-menu-container"></div>

    <div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l c-default">Tienda en línea </h1>
    </div>
  </div>
</div>
    <div class="l-main-container">

        <div class="b-breadcrumbs f-breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href=""><i class="fa fa-home"></i>Index</a></li>
                    <li><i class="fa fa-angle-right"></i><a href="#">Categoría</a></li>
                    
                </ul>
            </div>
        </div>
        <?php $pro=$producto->getById($_GET['id']);
        $img=$imagen->getByProd($pro->id);
        $valor=number_format($pro->valor, 2, ',', '.');?>
        <section class="b-infoblock">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="b-shortcode-example">
                        	 <h3 class="f-primary-b b-h4-special f-h4-special">Nombre del Producto</h3>
                           
                            <div class="b-product-card b-default-top-indent">
                                <div class="b-product-card__visual-wrap">
                                    <div class="flexslider b-product-card__visual flexslider-zoom">
                                        <ul class="slides">
                                            <?php foreach ($img as $im){ ?>
                                                <li>
                                                    <img src="Administer/public/img/<?php echo $im->imagen ?>" />
                                                </li>
                                            <?php } ?>

                                        </ul>
                                    </div>
                                    <div class="flexslider flexslider-thumbnail b-product-card__visual-thumb carousel-sm">
                                        <ul class="slides">
                                            <?php foreach ($img as $im){ ?>
                                                <li>
                                                    <img src="Administer/public/img/<?php echo $im->imagen ?>" />
                                                </li>
                                            <?php } ?>

                                        </ul>
                                    </div>
                                </div>
                                <div class="b-product-card__info">
                                    <div class=" f-primary-b b-title-b-hr f-title-b-hr b-null-top-indent"> Detalle del producto</div>
                                    <div class="b-product-card__info_row">
                                        <div class="b-product-card__info_title f-primary-b f-title-smallest">Precio</div>
                                        <span class="f-product-card__info_price c-default f-primary-b">$ <?php echo $valor ?>  </span>
                                    </div>
                                    
                                    <div class="b-product-card__info_row">
                                        <div class="b-product-card__info_description f-product-card__info_description">
                                            <?php echo $pro->descripcion ?>
                                        </div>
                                    </div>
                                    <div class="b-product-card__info_row">
                                        <div class="b-product-card__info_count">
                                            <input type="number" min="1" class="form-control form-control--secondary cantidad" value="1">
                                        </div>
                                        <div class="b-product-card__info_add b-margin-right-standard anadir">
                                            <div class=" b-btn f-btn b-btn-sm-md f-btn-sm-md btn-anadir">
                                                <a class="addCart"  data-img="<?php echo $img[0]->imagen ?>" data-id="<?php echo $pro->id ?>" data-valor="<?php echo $pro->valor ?>" data-nombre="<?php echo $pro->name ?>" data-idclasif="0" data-modi="modi"><i class="fa fa-shopping-cart"></i>  Comprar </a>
                                            </div>
                                        </div>

                                       <!-- <div class="b-product-card__info_like  b-btn f-btn b-btn-sm-md f-btn-sm-md b-btn--icon-only">
                                            <i class="fa fa-heart"></i>
                                        </div>-->
                                        
                                        <!--<div class="b-product-card__info_code">
                                            <input type="text" class="form-control form-control--secondary" placeholder="Ingrese su código de cupón">
                                        </div>
                                        <div class="b-product-card__info_submit  b-btn f-btn b-btn-sm-md f-btn-sm-md b-btn--icon-only">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>-->
                                        <?php $ca=$cat->getById($pro->categoria); ?>
                                         <div class="b-product-card__info_title f-primary-b f-title-smallest">Categorias</div>
                                        <a class="f-more f-title-smallest" href="MS-shop_listing_full_width.php?id=<?php echo $ca->id ?>"><?php echo $ca->nombre?></a>
                                        
                                    </div>
                                    <div class="b-product-card__info_row">
                                        
                                    </div>
                                                                  
                                   
                                    
                                    <div class="b-shortcode-example">
                            <div class="b-tabs f-tabs j-tabs b-tabs-reset">
                                <ul>
                                    <li><a href="#tabs-21">Descripción</a></li>
                                </ul>
                                <div class="b-tabs__content">
                                    <div id="tabs-21">
                                        <h4 class="f-tabs-vertical__title f-primary-b">Descripción detallada del producto</h4>
                                        <?php echo $pro->detalle?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                                    
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        

                        <div>
                            <h4 class="f-primary-b b-h4-special f-h4-special">Productos destacados</h4>
                            <div class="row">
                            
                                <div class="b-carousel-primary">
            <div class="j-carousel-primary">
                <?php $linea = new LineaPedido($con);
                $lineap=$linea->getPopulares();
                foreach ($lineap as $lp){
                    $prop=$producto->getById($lp->idPro);
                    $imgp=$imagen->getByProd($prop->id);
                    $valor=number_format($prop->valor, 2, ',', '.');?>
                    <div class="b-carousel-primary__item">
                        <div class="b-news-item b-news-item--medium-size f-news-item">
                            <div class=" b-news-item__img view view-sixth">
                                <img data-retina src="Administer/public/img/<?php echo $imgp[0]->imagen; ?>" alt="">
                                <div class="b-item-hover-action f-center mask">
                                    <div class="b-item-hover-action__inner">
                                        <div class="b-item-hover-action__inner-btn_group">
                                            <a class="b-btn f-btn b-btn-light f-btn-light info addCart" data-img="<?php echo $img[0]->imagen ?>" data-modi="modi" data-idclasif="0" data-id="<?php echo $prop->id ?>" data-valor="<?php echo $prop->valor ?>" data-nombre="<?php echo $prop->name ?>"><i class="fa fa-shopping-cart"></i></a>
                                            <a  href="MS-shop_detail.php?id=<?php echo $prop->id ?>" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="b-news-item__info">
                                <?php $cap=$cat->getById($prop->categoria)?>
                                <div class="f-news-item__info_category f-uppercase"><?php echo $cap->nombre?></div>
                                <a href="MS-shop_detail.php?id=<?php echo $prop->id ?>" class="b-news-item__info_title-big f-news-item__info_title-big f-primary-b"><?php echo $prop->name ?></a>
                                <div class="b-news-item__info_text f-news-item__info_text">
                                    <?php echo $prop->descripcion ?>
                                </div>

                                <div class="b-news-item__article">
                                    <span class="f-news-item__price f-primary-b b-left">$ <?php echo $valor ?></span>
                                    <div class="b-btn f-btn b-right b-btn-sm-md f-btn-sm-md f-primary-b addCart" data-img="<?php echo $img[0]->imagen ?>" data-modi="modi" data-idclasif="0" data-id="<?php echo $prop->id ?>" data-valor="<?php echo $prop->valor ?>" data-nombre="<?php echo $prop->name ?>">
                                        <i class="fa fa-shopping-cart"></i> Comprar
                                    </div>
                                </div>
                            </div>
                            <div class="b-action-info f-primary-b">
                                <div class="b-action-info_text f-action-info_text">PROMO</div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
                                
                                
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>
        </section>

    </div>
    <?php include("MS-pie.php"); ?>
    
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
<?php include 'footer.php'; ?>
</body>
</html>