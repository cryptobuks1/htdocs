<?php session_start();
$mipagina = "productos";
spl_autoload_register(function ($clase) {
    include 'Administer/class/'.$clase.'/'.$clase.'.php';
});

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tienda en Linea | MULTISONIDO</title>
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
<?php if(isset($_GET['id'])){$idcat=$_GET['id'];}?>
<body onload="javascript:pagination2(1,'pag','','',<?php echo $idcat?>);">
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

        <section class="b-infoblock">
            <div class="container">
                <div class="b-sort-panel">
                <div class="b-sort-panel__inner">
                    <div class="b-select b-left">
                        <select class="j-select old" name="productAtPage" id="productAtPage">
                            <option value="asc">Antiguo ▸ Nuevo</option>
                            <option selected="selected" value="desc">Nuevo ▸ Antiguo</option>
                        </select>
                    </div>

                    <div class="b-select b-left ">
                        <select class="j-select by" name="productAtPage" id="productAtPage">
                            <option value="valor">Ordenar por precio</option>
                            <option selected="selected" value="name">Ordenar por nombre</option>
                        </select>
                    </div>
                    <a class="f-primary-b orderbyoldpro" data-id="<?php echo $idcat?>">
                        <i class="b-sort-panel__inner_icon-sort f-sort-panel__inner_icon-sort fas fa-sort-amount-up cursor-pointer "></i>
                    </a>


                    <!--<div class="b-view-switcher f-view-switcher b-right">
                        <div class="b-view-switcher_column is-view-switcher__item-active fa fa-th-list"></div>
                        <div class="b-view-switcher_table fa fa-th"></div>
                    </div>-->
                </div>
            </div>
                <div class="row">
                    <div class="row">
                        <div class="b-col-default-indent agregaItems" id="agrega-productos">
                            <?php $produc=$producto->getAll();
                            foreach ($produc as $pr){
                                $valor=number_format($pr->valor, 2, ',', '.');?>
                                <div class="col-md-6">
                                    <div class="b-news-item b-news-item--medium-size f-news-item">
                                        <div class="b-news-item__img view view-sixth">
                                            <?php $img=$imagen->getByProd($pr->id);
                                            ?>
                                            <img data-retina src="Administer/public/img/<?php echo $img[0]->imagen ?>" alt=""/>
                                            <div class="b-item-hover-action f-center mask">
                                                <div class="b-item-hover-action__inner">
                                                    <div class="b-item-hover-action__inner-btn_group"><
                                                        <!--<a href="#" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-heart"></i></a>-->
                                                        <a href="#" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-shopping-cart addCart" data-img="<?php echo $img[0]->imagen ?>" data-modi="modi" data-idclasif="0" data-id="<?php echo $pr->id ?>" data-valor="<?php echo $pr->valor ?>" data-nombre="<?php echo $pr->name ?>"></i></a>
                                                        <a href="MS-shop_listing_full_width.php?id=<?php echo $pr->id ?>" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="b-news-item__info">
                                            <?php $cap=$cat->getById($pr->categoria)?>
                                            <div class="f-news-item__info_category f-uppercase"><i class="<?php echo $cap->img ?>"></i> <?php echo $cap->nombre ?></div>
                                            <a href="MS-shop_detail.php" class="b-news-item__info_title-big f-news-item__info_title-big f-primary-b">Morphy Richards</a>
                                            <div class="b-news-item__info_text f-news-item__info_text">
                                                <?php echo $pr->descripcion ?>
                                            </div>

                                            <div class="b-news-item__article">
                                                <span class="f-news-item__price f-primary-b b-left">$ <?php echo $valor ?></span>
                                                <input type="hidden" class="cantidad" value="1">
                                                <div class="b-btn f-btn b-right b-btn-sm-md f-btn-sm-md f-primary-b addCart" data-img="<?php echo $img[0]->imagen ?>" data-modi="modi" data-idclasif="0" data-id="<?php echo $pr->id ?>" data-valor="<?php echo $pr->valor ?>" data-nombre="<?php echo $pr->name ?>">
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
                            <div class="clearfix visible-xs-block"></div>
                        </div>

                        <div class="container">
                            <div class="b-pagination f-pagination">
                                <ul class="pagination" id="pagination2"></ul>
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