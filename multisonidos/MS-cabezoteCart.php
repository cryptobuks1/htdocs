<?php $con=new Conexion();
$cat=new Categoria($con);
$producto=new Producto($con);
$imagen= new Imagen($con);
$marca=new Marca($con);
$options=new Options($con);
$dolar=$options->getByName('valor_dolar');
$pro=$producto->getFilter('ORDER BY id DESC LIMIT 0,2'); ?>
<header class="b-header--bottom-menu">
      <div class="b-top-options-panel">
          <div class="container">
              <div class="b-option-contacts f-option-contacts">
                  <a href="mailto:frexystudio@gmail.com"><i class="fas fa-envelope"></i> info@multisonidos.com</a>
                  <a href="#"><i class="fas fa-mobile-alt"></i> Cel.: (57) 310 282 3961  whatsapp </a>
                  <a href="#"><i class="fa fa-phone "></i> Tel.: (57+2) 881 6218 - 839 5344</a>
              </div>
              <div class="b-right">
                          <span class="b-header__social-box b-header__social-box--no-fon">
                              <a href="#"><i class="fab fa-facebook-square"></i></a>
                              <a href="#"><i class="fab fa-instagram"></i></a>
                              <a href="#"><i class="fab fa-linkedin"></i></a>
                          </span>
                          <span class="b-option-contacts f-option-contacts "><a href="#">Quiero ser Distribuidor</a>| </span>
              </div>
          </div>
      </div>
      <div class="container b-header__box b-relative b-header--hide">
          <a href="/" class="b-left b-logo"><img class="color-theme" data-retina src="img/logo-header-default.png" alt="Logo" /></a>
          <div class="b-right b-header-ico-group f-header-ico-group b-right">
              <span class="b-header__search-box">
                  <i class="fa fa-search"></i>
                  <input type="text" class="buscar" placeholder="Estoy buscando..."/>
              </span>
              <?php if(isset($_SESSION['user'])) { ?>
              <span>
                  <a class="dropdown-toggle " data-toggle="dropdown" href="#">
                      <i class="fa fa-user"></i> <?php echo $_SESSION["user"]["usuario"]; ?>
                      <span class="caret"></span></a>
                  <ul class="dropdown-menu b-top-user pull-right">
                      <li class="b-top-nav__2level f-top-nav__2level f-primary f-top-nav__2level_title"><a href="MS-micuenta.php">Mi Cuenta</a></li>
                      <li class="b-top-nav__2level f-top-nav__2level f-primary f-top-nav__2level_title"><a href="logout.php">Cerrar Sesión</a></li>
                  </ul>
              </span>
              <?php }else{ ?>
              <span>
                  <i class="fa fa-user"></i>
                  <a href="MS-login.php"> Identifícate </a>
                  |
                  <a href="MS-registro.php"><strong>Registrate</strong>
                  </a>
              </span>
              <?php } ?>
          </div>
          <div class="b-top-nav-show-slide f-top-nav-show-slide j-top-nav-show-slide b-right"><i class="fa fa-align-justify"></i></div>
      </div>
      
  <div class="container b-relative">
          <div class="b-header-r">
              <nav class="b-top-nav b-top-nav--bottom b-top-nav--bottom--icon f-top-nav j-top-nav b-top-nav--icon">
                  <ul class="b-top-nav__1level_wrap">
                      <?php $audio=$cat->getByTag("'audiocar'");
                      $electro=$cat->getByTag("'electrodomesticos'");
                      $papel=$cat->getByTag("'papelpolarizado'");
                      ?>
                        <li class="b-top-nav__1level f-top-nav__1level f-primary-b" <?php if($mipagina=="index"){ echo 'class="is-active-top-nav__1level"'; } ?>><a href="index.php"><i class="fa fa-home b-menu-1level-ico"></i>Inicio <span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        </li>
                        <li class="b-top-nav__1level f-top-nav__1level f-primary-b" <?php if($mipagina=="index"){ echo 'class="is-active-top-nav__1level"'; } ?>>
                            <a href="MS-shop_listing_full_width.php?id=<?php echo $audio[0]->id ?>"><i class="<?php echo $audio[0]->img ?>"></i> <?php echo $audio[0]->nombre ?><span class="b-ico-dropdown"></span></a>
                            <div class="b-top-nav__dropdomn">
                                <ul class="b-top-nav__2level_wrap">
                                    <li class="b-top-nav__2level_title f-top-nav__2level_title"><?php echo $audio[0]->nombre ?></li>
                                    <?php $proaudio=$producto->getByIdCat($audio[0]->id);
                                    foreach ($proaudio as $pa){?>
                                    <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="MS-shop_detail.php?id=<?php echo $pa->id ?>"><i class="fa fa-angle-right"></i><?php echo $pa->name ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                      <li class="b-top-nav__1level f-top-nav__1level f-primary-b" <?php if($mipagina=="index"){ echo 'class="is-active-top-nav__1level"'; } ?>>
                          <a href="MS-shop_listing_full_width.php?id=<?php echo $papel[0]->id ?>"><i class="<?php echo $papel[0]->img ?>"></i> <?php echo $papel[0]->nombre ?><span class="b-ico-dropdown"></span></a>
                          <div class="b-top-nav__dropdomn">
                              <ul class="b-top-nav__2level_wrap">
                                  <li class="b-top-nav__2level_title f-top-nav__2level_title"><?php echo $papel[0]->nombre ?></li>
                                  <?php $proaudio=$producto->getByIdCat($papel[0]->id);
                                  foreach ($proaudio as $pa){?>
                                      <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="MS-shop_detail.php?id=<?php echo $pa->id ?>"><i class="fa fa-angle-right"></i><?php echo $pa->name ?></a></li>
                                  <?php } ?>
                              </ul>
                          </div>
                      </li>
                        <li class="b-top-nav__1level f-top-nav__1level f-primary-b" <?php if($mipagina=="index"){ echo 'class="is-active-top-nav__1level"'; } ?>>
                            <a href="MS-shop_listing_full_width.php?id=<?php echo $electro[0]->id ?>"><i class="<?php echo $electro[0]->img ?>"></i> <?php echo $electro[0]->nombre ?><span class="b-ico-dropdown"></span></a>
                            <div class="b-top-nav__dropdomn">
                                <ul class="b-top-nav__2level_wrap">
                                    <li class="b-top-nav__2level_title f-top-nav__2level_title"><?php echo $electro[0]->nombre ?></li>
                                    <?php $subelectro=$cat->getByTag("'computablet','celular', 'televisor', 'audiovideo'");
                                    foreach ($subelectro as $sub){
                                        $prosub=$producto->getByIdCat($sub->id);?>
                                    <li class="b-top-nav__2level f-top-nav__2level f-primary b-top-nav__with-multi-lvl"><a onclick="return false" href="MS-shop_listing_full_width.php?id=<?php echo $sub->id ?>"><i class="<?php echo $sub->img ?>"></i> <?php echo $sub->nombre?></a>
                                        <ul class="b-top-nav__multi-lvl-box">
                                            <?php foreach ($prosub as $pros){ ?>
                                            <li class="b-top-nav__multi-lvl"><a href="MS-shop_detail.php?id=<?php echo $pros->id ?>"><i class="fa fa-angle-right"></i><?php echo $pros->name?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>

                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                      <li class="b-top-nav__1level f-top-nav__1level f-primary-b" <?php if($mipagina=="index"){ echo 'class="is-active-top-nav__1level"'; } ?>>
                              <a href="MS-shop_listing_full_width.php"><i class="fa fa-inbox b-menu-1level-ico"></i> marcas<span class="b-ico-dropdown"></span></a>
                          <div class="b-top-nav__dropdomn">
                              <ul class="b-top-nav__2level_wrap">
                                  <li class="b-top-nav__2level_title f-top-nav__2level_title">marcas</li>
                                  <?php $mar=$marca->getAll();
                                  foreach ($mar as $m){?>
                                      <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="MS-shop_listing_full_width.php?id=<?php echo $m->id ?>"><i class="fa fa-angle-right"></i><?php echo $m->nombre ?></a></li>
                                  <?php } ?>
                              </ul>
                          </div>
                      </li>


                        <li class="b-top-nav__1level f-top-nav__1level f-primary-b" <?php if($mipagina=="contacto"){ echo 'class="is-active-top-nav__1level"'; } ?>>
                            <a href="MS-contacto.php"><i class="fa fa-headphones b-menu-1level-ico"></i>Contacto<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        </li>
                  </ul>

              </nav>
          </div>
      </div>
  </header>