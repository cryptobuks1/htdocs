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
      <title>MULTISONIDO</title>
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

    <?php include("MS-cabezote.php"); ?>

    <div class="j-menu-container"></div>


      <div class="l-main-container">

      <div class="b-slidercontainer">
          <div class="b-slider j-fullscreenslider ">
              <ul>
                  <li data-transition="" data-slotamount="7">
                      <div class="tp-bannertimer"></div>
                      <img data-retina src="img/slider/slider_shop_1.jpg">
                      <div class="caption sfb"  data-x="center" data-y="bottom" data-speed="700" data-start="1700" data-easing="Power4.easeOut"><img data-retina src="img/slider/slider_shop_1-1.png"></div>
                      <div class="caption"  data-x="180" data-y="bottom" data-voffset="-1" data-speed="2100" data-start="3300" data-easing="easeOutBack"></div>




                  </li>
                  <li data-transition="" data-slotamount="7">
                      <div class="tp-bannertimer"></div>
                      <img data-retina src="img/slider/slider_shop_1.jpg">
                      <div class="caption sfb"  data-x="30" data-y="bottom" data-speed="700" data-start="1700" data-easing="Power4.easeOut"><img data-retina src="img/slider/slider-shop-2-2.png"></div>
                      <div class="caption lfr"  data-x="400"  data-y="100" data-speed="300" data-start="2000">
                          <div class="b-header-group f-header-group f-header-group--light">
                              <h2 class="f-primary-l">Sound</h2>
                              <h1 class="f-primary-sb">Equipos de sonido</h1>
                          </div>
                      </div>
                      <div class="caption lfb"  data-x="400" data-y="270" data-speed="300" data-start="2300">
                          <p class="f-primary-b f-uppercase f-slider-lg_text-medium c-white" >Lorem ipsum dolor sit amet, consectetur adipis</p>
                      </div>
                      <div class="caption lfb"  data-x="400" data-y="300" data-speed="300" data-start="2600">
                          <p class="f-primary-b f-uppercase f-slider-lg_text-medium c-white" >Vestibulum scelerisque in enim </p>
                      </div>
                      <div class="caption"  data-x="400" data-y="340" data-speed="600" data-start="3000">
                          <p><a class="b-link f-link f-primary-b f-uppercase" href="#">more <span><i class="fa fa-chevron-right"></i></span></a></p>
                      </div>
                  </li>
                  <li data-transition="" data-slotamount="7">
                      <div class="tp-bannertimer"></div>
                      <img data-retina src="img/slider/slider_shop_1.jpg">
                      <div class="caption sfb"  data-x="30" data-y="bottom" data-speed="700" data-start="1700" data-easing="Power4.easeOut"><img data-retina src="img/slider/slider-shop-3-3.png"></div>
                      <div class="caption lfr"  data-x="400"  data-y="100" data-speed="300" data-start="2000">
                          <div class="b-header-group f-header-group f-header-group--light">
                              <h2 class="f-primary-l">Sound</h2>
                              <h1 class="f-primary-sb">Equipos de sonido</h1>
                          </div>
                      </div>
                      <div class="caption lfb"  data-x="400" data-y="270" data-speed="300" data-start="2300">
                          <p class="f-primary-b f-uppercase f-slider-lg_text-medium c-white" >Lorem ipsum dolor sit amet, consectetur adipis</p>
                      </div>
                      <div class="caption lfb"  data-x="400" data-y="300" data-speed="300" data-start="2600">
                          <p class="f-primary-b f-uppercase f-slider-lg_text-medium c-white" >Vestibulum scelerisque in enim </p>
                      </div>
                      <div class="caption"  data-x="400" data-y="340" data-speed="600" data-start="3000">
                          <p><a class="b-link f-link f-primary-b f-uppercase" href="#">more <span><i class="fa fa-chevron-right"></i></span></a></p>
                      </div>
                  </li>
              </ul>
          </div>
      </div>

    <section class="b-infoblock b-diagonal-line-bg-light">
      <div class="container">
        <div class="row b-col-default-indent">
            <?php
            foreach ($pro as $pr){
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
                                    <a class="b-btn f-btn b-btn-light f-btn-light info addCart" data-img="<?php echo $img[0]->imagen ?>" data-modi="modi" data-idclasif="0" data-id="<?php echo $pr->id ?>" data-valor="<?php echo $pr->valor ?>" data-nombre="<?php echo $pr->name ?>"><i class="fa fa-shopping-cart "></i></a>
                                    <a href="MS-shop_detail?id=<?php echo $pr->id ?>" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="b-news-item__info">
                        <?php $cap=$cat->getById($pr->categoria)?>
                        <div class="f-news-item__info_category f-uppercase"><i class="<?php echo $cap->img ?>"></i> <?php echo $cap->nombre ?></div>
                        <a href="MS-shop_detail.php" class="b-news-item__info_title-big f-news-item__info_title-big f-primary-b"><?php echo $pr->name ?></a>
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
        </div>
      </div>
    </section>
    <section class="b-infoblock">
        <div class="container">
            <div class="row">
                <div class="col-md-9 ">
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
                <a class="f-primary-b orderbyold">
                    <i class="b-sort-panel__inner_icon-sort f-sort-panel__inner_icon-sort fas fa-sort-amount-up cursor-pointer "></i>
                </a>


                <!--<div class="b-view-switcher f-view-switcher b-right">
                    <div class="b-view-switcher_column is-view-switcher__item-active fa fa-th-list"></div>
                    <div class="b-view-switcher_table fa fa-th"></div>
                </div>-->
        </div>
    </div>
    <div class="row">
        <div class="b-col-default-indent agregaItems" id="agrega-registros">
            <?php $produc=$producto->getAll();
            foreach ($produc as $prod){
                $valor=number_format($prod->valor, 2, ',', '.');?>
            <div class="col-md-4 col-sm-4 col-xs-6 col-mini-12">
                <div class="b-product-preview">
                    <div class="b-product-preview__img view view-sixth">
                        <?php $img=$imagen->getByProd($prod->id);
                        ?>
                        <img data-retina src="Administer/public/img/<?php echo $img[0]->imagen ?>" alt=""/>
                        <div class="b-item-hover-action f-center mask">
                            <div class="b-item-hover-action__inner">
                                <div class="b-item-hover-action__inner-btn_group">
                                    <a class="b-btn f-btn b-btn-light f-btn-light info addCart2" data-img="<?php echo $img[0]->imagen ?>" data-modi="modi" data-idclasif="0" data-id="<?php echo $pr->id ?>" data-valor="<?php echo $pr->valor ?>" data-nombre="<?php echo $pr->name ?>"><i class="fa fa-shopping-cart "></i></a>

                                    <a href="MS-shop_detail.php?id=<?php echo $prod->id ?>" class="b-btn f-btn b-btn-light f-btn-light info "><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="b-product-preview__content">

                        <div class="b-product-preview__content_col">
                            <?php $cap=$cat->getById($prod->categoria)?>
                            <a href="MS-shop_detail.php?id=<?php echo $prod->id ?>" class="f-product-preview__content_title"><?php echo $prod->name ?></a>
                            <div class="f-product-preview__content_category f-primary-b"><a href=""><i class="<?php echo $cap->img ?>"></i> <?php echo $cap->nombre ?></a> </div>
                        </div>
                        <div class="b-product-preview__content_col">
                            <span class="b-product-preview__content_price f-product-preview__content_price f-primary-b">$ <?php echo $valor ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="clearfix visible-xs-block"></div>
        </div>

        <div class="container">
            <div class="b-pagination f-pagination">
                    <ul class="pagination" id="pagination"></ul>
    </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <aside>
        <div class="row b-col-default-indent">
            <div class="col-md-12">
                <h4 class="f-primary-b b-h4-special f-h4-special c-primary">Filtrar por precio</h4>
                <div class="row">
                    <div class="col-md-6 nopadding">
                        <input type="text" class="form-control filtermin" placeholder="Valor mínimo"/>
                    </div>
                    <div class="col-md-6 nopadding">
                        <input type="text" class="form-control filtermax" placeholder="Valor máximo"/>
                    </div>
                </div><br>
                 <a class="b-btn f-btn b-btn-sm f-btn-sm b-btn-default f-primary-b filtervalor">Filtrar</a>
            </div>
            <div class="col-md-12">
                <div class="b-categories-filter">
                    <h4 class="f-primary-b b-h4-special f-h4-special c-primary">Filtrar por categorías</h4>
                    <ul>
                        <?php $cats=$cat->getAll();
                        foreach ($cats as $ca){
                            $catpro=count($producto->getByIdCat($ca->id));
                            if($catpro>0){?>
                                <li>
                                    <a class="f-categories-filter_name cursor-pointer categ" data-id="<?php echo $ca->id ?>"><i class="fa fa-plus"></i> <?php echo $ca->nombre ?></a>
                                    <span class="b-categories-filter_count f-categories-filter_count"><?php echo  $catpro ?></span>
                                </li>
                        <?php }
                            } ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <h4 class="f-primary-b b-h4-special f-h4-special c-primary">Productos Populares</h4>
                <?php $linea = new LineaPedido($con);
                $lineap=$linea->getPopulares();
                foreach ($lineap as $lp){
                    $prop=$producto->getById($lp->idPro);
                    $imgp=$imagen->getByProd($prop->id);?>
                <div class="b-blog-short-post b-blog-short-post--popular b-blog-short-post--w-img b-blog-short-post--img-hover-bordered f-blog-short-post--w-img row f-blog-short-post--popular">
                    <div class="b-blog-short-post__item col-md-12 col-sm-6 col-xs-12">
                        <div class="b-blog-short-post__item_img">
                            <a href="MS-shop_detail.php?id=<?php echo $prop->id ?>"><img data-retina src="Administer/public/img/<?php echo $imgp[0]->imagen; ?>" alt=""/></a>
                        </div>
                        <div class="b-remaining">
                            <div class="b-blog-short-post__item_text f-blog-short-post__item_text">
                                <a href="MS-shop_detail.php?id=<?php echo $prop->id ?>"><?php echo $prop->name ?></a>
                            </div>
                            <div class="f-blog-short-post__item_price  f-primary-b">
                                $ <?php echo number_format($prop->valor,2,',','.'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </aside>
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