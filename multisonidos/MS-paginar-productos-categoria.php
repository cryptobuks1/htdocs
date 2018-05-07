<?php session_start();
$mipagina = "index";
spl_autoload_register(function ($clase) {
    include 'Administer/class/'.$clase.'/'.$clase.'.php';
});
$con=new Conexion();
$producto=new Producto($con);
$imagen= new Imagen($con);
$cat=new Categoria($con);

	$paginaActual = $_POST['partida'];
	$idcat=$_POST['idcat'];
    $nroProductos = $producto->getNumRowbyCat($idcat);
    $nroLotes = 6;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';
    $filtertype=$_POST['filter'];

    $max=isset($_POST['max']) ? $_POST['max'] : '';
    $min=isset($_POST['min']) ? $_POST['min'] : '';
    $order=isset($_POST['order']) ? $_POST['order'] : '';
    $orderold=isset($_POST['orderold']) ? $_POST['orderold'] : '';
    $catego=isset($_POST['cat']) ? $_POST['cat'] : '';

    function lista($paginaActual, $nroPaginas, $param, $order, $orderold, $idcat)
    {
        $lista='';
        if ($paginaActual > 1) {
            $lista = $lista . '<li><a href="javascript:pagination2(' . ($paginaActual - 1) . ',' . $param . ',' . $order . ',' . $orderold . ',' . $idcat . ');" >Anterior</a></li>';
        }
        for ($i = 1; $i <= $nroPaginas; $i++) {
            if ($i == $paginaActual) {
                $lista = $lista . '<li class="active"><a href="javascript:pagination2(' . $i . ',' . $param . ',' . $order . ',' . $orderold . ',' . $idcat . ');" >' . $i . '</a></li>';
            } else {
                $lista = $lista . '<li><a href="javascript:pagination2(' . $i . ',' . $param . ',' . $order . ',' . $orderold . ',' . $idcat . ');" >' . $i . '</a></li>';
            }
        }
        if ($paginaActual < $nroPaginas) {
            $lista = $lista . '<li><a href="javascript:pagination2(' . ($paginaActual + 1) . ',' . $param . ',' . $order . ',' . $orderold . ',' . $idcat . ');" >Siguiente</a></li>';
        }
        return $lista;
    }

  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}
  	$filter='';
    $title='';
    switch($filtertype){

        case 'orderpro':
            $col='';
            if($order=='name'){$col='Nombre';}else{$col='Precio';}
            if($orderold=='asc') {
                $filter = 'WHERE categoria='.$idcat.' ORDER BY '.$order.' ASC LIMIT ' . $limit . ',' . $nroLotes;
                $title='('.$nroProductos.') Productos encontrados ordenados por '.$col.' de antigua a nuevo';
            }else{
                $filter = 'WHERE categoria='.$idcat.' ORDER BY '.$order.' DESC LIMIT ' . $limit . ',' . $nroLotes;
                $title='('.$nroProductos.') Productos encontrados ordenados por '.$col.' de nuevo a antigua';
            }
            $lista=lista($paginaActual, $nroPaginas, "'".$filtertype."'", "'".$order."'", "'".$orderold."'", "'".$idcat."'");
            $pro=$producto->getFilter($filter);

            break;

        case 'pag':
            $filter='WHERE categoria='.$idcat.' ORDER BY id DESC LIMIT '.$limit.','.$nroLotes;
            $lista=lista($paginaActual, $nroPaginas, "'".$filtertype."'", "'".$order."'", "'".$orderold."'", "'".$idcat."'");
            $pro=$producto->getFilter($filter);
            break;
    }
    $tabla = $tabla . '<h4 class="f-primary-b b-h4-special f-h4-special c-primary">' . $title . '</h4>';
    foreach ($pro as $prod) {
        $cap=$cat->getById($prod->categoria);
        $valor = number_format($prod->valor, 2, ',', '.');

        $tabla = $tabla . '<div class="col-md-6">
                                <div class="b-news-item b-news-item--medium-size f-news-item">
                                    <div class="b-news-item__img view view-sixth">';
                                        $img=$imagen->getByProd($prod->id);
        $tabla=$tabla.'<img data-retina src="Administer/public/img/'.$img[0]->imagen.'" alt=""/>
                                        <div class="b-item-hover-action f-center mask">
                                            <div class="b-item-hover-action__inner">
                                                <div class="b-item-hover-action__inner-btn_group">
                                                    <!--<a href="#" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-heart"></i></a>-->
                                                    <a class="b-btn f-btn b-btn-light f-btn-light info addCart2" data-img="'.$img[0]->imagen.'" data-modi="modi" data-idclasif="0" data-id="'.$prod->id.'" data-valor="'.$prod->valor.'" data-nombre="'.$prod->name.'"><i class="fa fa-shopping-cart "></i></a>
                                                    <a href="MS-shop_listing_full_width.php?id='.$prod->id.'" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="b-news-item__info">
                                    <div class="f-news-item__info_category f-uppercase"><i class="'.$cap->img.'"></i>'.$cap->nombre.'</div>
                                        <a href="MS-shop_detail.php" class="b-news-item__info_title-big f-news-item__info_title-big f-primary-b"> '.$prod->name.'</a>
                                        <div class="b-news-item__info_text f-news-item__info_text">
                                            '.$prod->descripcion.'
                                        </div>

                                        <div class="b-news-item__article">
                                            <span class="f-news-item__price f-primary-b b-left">$ '.$valor.'</span>
                                            <input type="hidden" class="cantidad" value="1">
                                            <div class="b-btn f-btn b-right b-btn-sm-md f-btn-sm-md f-primary-b addCart2" data-img="'.$img[0]->imagen.'" data-modi="modi" data-idclasif="0" data-id="'.$prod->id.'" data-valor="'.$prod->valor.'" data-nombre="'.$prod->name.'">
                                                <i class="fa fa-shopping-cart"></i> Comprar
                                            </div>
                                        </div>
                                    </div>
                                    <div class="b-action-info f-primary-b">
                                        <div class="b-action-info_text f-action-info_text">PROMO</div>
                                    </div>
                                </div>
                            </div>';
                            }
    $tabla = $tabla . '<div class="clearfix visible-xs-block"></div>';


    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>