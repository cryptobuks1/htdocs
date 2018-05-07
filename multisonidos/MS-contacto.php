<?php $mipagina = "contacto"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contacto | MULTISONIDO</title>
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
      <h1 class="f-primary-l c-default">Contacto</h1>
    </div>
  </div>
</div>

<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
                <li><i class="fa fa-angle-right"></i><span> Contacto </span></li>
            </ul>
        </div>
    </div>
    <section class="b-google-map map-theme b-bord-box" data-location-set="contact-us">
        <div class="b-google-map__map-view b-google-map__map-height">
    <!-- Google map load -->
</div>
<img data-retina src="img/google-map-marker-default.png" data-label="" class="marker-template hidden" />
<div class="b-google-map__info-window-template hidden"
     data-selected-marker="0"
     data-width="250">
    <div class="b-google-map__info-window f-center b-google-map__info-office f-google-map__info-office">
    <h4 class="f-primary-b">Frexy Studio</h4>
    <small>Heading Office</small>
</div>
</div>
    </section>
    <div class="b-desc-section-container">
        
        <section class="container">
            <div  class="b-diagonal-line-bg-light b-bord-box row">
                <div class="col-sm-6 b-contact-form-box">
                    <h3 class="f-primary-b b-title-description f-title-description">
                        Formulario de Contacto
                        <div class="b-title-description__comment f-title-description__comment f-primary-l">Si desea que nos contactemos con usted puede llenar el formulario acontinuación. <br>
                        Los campos marcados con <span class="f-title-description">*</span> son indispensables para el correcto envío del mensaje.</div>
                    </h3>
                    <div class="row">
                        <form action="" method="post">
                            <div class="col-md-6">
                                <div class="b-form-row">
                                    <label class="b-form-vertical__label" for="name">Su Nombre <span class="f-title-description"><small>*</small></span></label>
                                    <div class="b-form-vertical__input">
                                        <input type="text" id="name" class="form-control" required autocomplete="on" />
                                    </div>
                                </div>
                                <div class="b-form-row">
                                    <label class="b-form-vertical__label" for="email"> E-mail <span class="f-title-description"><small>*</small></span></label>
                                    <div class="b-form-vertical__input">
                                        <input type="email" id="email" class="form-control" required autocomplete="on" />
                                    </div>
                                </div>
                                <div class="b-form-row">
                                    <label class="b-form-vertical__label" for="tel">Teléfono <span class="f-title-description"><small>*</small></span></label>
                                    <div class="b-form-vertical__input">
                                        <input type="tel" id="tel" class="form-control" required autocomplete="on"/>
                                    </div>
                                </div>
                                <div class="b-form-row">
                                    <label class="b-form-vertical__label" for="asunto">Asunto</label>
                                    <div class="b-form-vertical__input">
                                        <input type="text" id="asunto" class="form-control" autocomplete="on" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="b-form-row b-form--contact-size">
                                    <label class="b-form-vertical__label"> Mensaje</label>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                                <div class="b-form-row">
                                <div class="b-form-vertical__label">
                              <label for="create_account_terms">
                                  <input type="checkbox" class="b-form-checkbox b-form-checkbox" id="create_account_terms" />
                                  <span>Acepto <a href="#" class="c-secondary f-more">Términos y Condiciones</a></span>
                              </label>
                          </div>
                          </div>
                                <div class="b-form-row">
                                <input type="submit" class="b-btn f-btn b-btn-md b-btn-default f-primary-b b-btn__w100" id="enviar" title="enviar">
                                  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 b-contact-form-box">
                    <h3 class="f-primary-b b-title-description f-title-description">
                        Contacto 
                        <div class="b-title-description__comment f-title-description__comment f-primary-l">Puede contactarnos de manera personal por los siguientes medios.</div>
                    </h3>
                    <div class="row b-google-map__info-window-address">
                        <ul class="list-unstyled">
    <li class="col-xs-12">
        <div class="b-google-map__info-window-address-icon f-center pull-left">
            <i class="fa fa-home"></i>
        </div>
        <div>
            <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                Bodega - Cali - Colombia
            </div>
            <div class="desc">Calle 16 #5-56, Bodega 4-26 Centro comercial Diamante 2 </div>
        </div>
    </li>
    <li class="col-xs-12">
        <div class="b-google-map__info-window-address-icon f-center pull-left">
            <i class="fa fa-phone"></i>
        </div>
        <div>
            <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                Teléfono
            </div>
            <div class="desc"><big>Tel.:  (57+2) 881 6218 - 395 3448</big></div>
        </div>
    </li>
    <li class="col-xs-12">
        <div class="b-google-map__info-window-address-icon f-center pull-left">
            <i class="fa fa-mobile-phone"></i>
        </div>
        <div>
            <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                Celular
            </div>
            <div class="desc"><a href="tel:57+3167846679 "> <big> Cel.:  (57) 316 784 6679 <i class="fa fa-phone-square"></i></big> whatsapp</a></div>
        </div>
    </li>
    <li class="col-xs-12">
        <div class="b-google-map__info-window-address-icon f-center pull-left">
            <i class="fa fa-envelope"></i>
        </div>
        <div>
            <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                e-mail
            </div>
            <div class="desc">ventas@multisonidos.com</div>
        </div>
    </li>
    <li class="col-xs-12">
        <div class="b-google-map__info-window-address-icon f-center pull-left">
            <i class="fa fa-home"></i>
        </div>
        <div>
            <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                Oficina - Cali - Colombia
            </div>
            <div class="desc"> Calle 16 #3-26, Of 058 </div>
        </div>
    </li>
    <li class="col-xs-12">
        <div class="b-google-map__info-window-address-icon f-center pull-left">
            <i class="fa fa-phone"></i>
        </div>
        <div>
            <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                Teléfono
            </div>
            <div class="desc"><big>Tel.:  (57+2) 396 0022</big></div>
        </div>
    </li>
</ul>

                    </div>
                </div>
            </div>
        </section>
    </div>
    
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
<script src="js/imagesloaded.pkgd.min.js"></script>
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
        src="http://maps.google.com/maps/api/js?sensor=false&amp;key=AIzaSyDnlkdNlyQEGBpSZKm3JKZbk-E_BzoZM18"></script>
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


</body>
</html>

