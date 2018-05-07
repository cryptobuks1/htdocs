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
    $nroProductos = $producto->getNumRow();
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

    function lista($paginaActual, $nroPaginas, $param, $max, $min, $order, $orderold, $catego)
    {
        $lista='';
        if ($paginaActual > 1) {
            $lista = $lista . '<li><a href="javascript:pagination(' . ($paginaActual - 1) . ',' . $param . ',' . $min . ',' . $max . ',' . $order . ',' . $orderold . ',' . $catego . ');" >Anterior</a></li>';
        }
        for ($i = 1; $i <= $nroPaginas; $i++) {
            if ($i == $paginaActual) {
                $lista = $lista . '<li class="active"><a href="javascript:pagination(' . $i . ',' . $param . ',' . $min . ',' . $max . ',' . $order . ',' . $orderold . ',' . $catego . ');" >' . $i . '</a></li>';
            } else {
                $lista = $lista . '<li><a href="javascript:pagination(' . $i . ',' . $param . ',' . $min . ',' . $max . ',' . $order . ',' . $orderold . ',' . $catego . ');" >' . $i . '</a></li>';
            }
        }
        if ($paginaActual < $nroPaginas) {
            $lista = $lista . '<li><a href="javascript:pagination(' . ($paginaActual + 1) . ',' . $param . ',' . $min . ',' . $max . ',' . $order . ',' . $orderold . ',' . $catego . ');" >Siguiente</a></li>';
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
        case 'valor':
            $nroProductos=count($producto->getFilter('WHERE valor BETWEEN '.$min.' AND '.$max.' ORDER BY id DESC'));
            $filter='WHERE valor BETWEEN '.$min.' AND '.$max.' ORDER BY id DESC LIMIT '.$limit.','.$nroLotes;
            $pro=$producto->getFilter($filter);
            $nroPaginas=ceil($nroProductos/$nroLotes);
            $lista=lista($paginaActual, $nroPaginas, "'".$filtertype."'", "'".$max."'", "'".$min."'", "'".$order."'", "'".$orderold."'", "'".$catego."'");
            $title='('.$nroProductos.') Productos encontrados con precio de $'.number_format($min, 2, ',', '.').' hasta $'.number_format($max, 2, ',', '.');
            break;
        case 'order':
            $col='';
            if($order=='name'){$col='Nombre';}else{$col='Precio';}
            if($orderold=='asc') {
                $filter = 'ORDER BY '.$order.' ASC LIMIT ' . $limit . ',' . $nroLotes;
                $title='('.$nroProductos.') Productos encontrados ordenados por '.$col.' de antigua a nuevo';
            }else{
                $filter = 'ORDER BY '.$order.' DESC LIMIT ' . $limit . ',' . $nroLotes;
                $title='('.$nroProductos.') Productos encontrados ordenados por '.$col.' de nuevo a antiguo';
            }
            $lista=lista($paginaActual, $nroPaginas, "'".$filtertype."'", "'".$max."'", "'".$min."'", "'".$order."'", "'".$orderold."'", "'".$catego."'");
            $pro=$producto->getFilter($filter);

            break;
        case 'cat':
            $nroProductos=count($producto->getFilter('WHERE categoria='.$catego));
            $filter='WHERE categoria='.$catego.' ORDER BY id DESC LIMIT '.$limit.','.$nroLotes;
            $pro=$producto->getFilter($filter);
            $nroPaginas=ceil($nroProductos/$nroLotes);
            $lista=lista($paginaActual, $nroPaginas, "'".$filtertype."'", "'".$max."'", "'".$min."'", "'".$order."'", "'".$orderold."'", "'".$catego."'");
            $categori=$cat->getById($catego);
            $title='('.$nroProductos.') Productos encontrados de la categoria '.$categori->nombre;
            break;
        case 'pag':
            $filter='ORDER BY id DESC LIMIT '.$limit.','.$nroLotes;
            $lista=lista($paginaActual, $nroPaginas, "'".$filtertype."'", "'".$max."'", "'".$min."'", "'".$order."'", "'".$orderold."'", "'".$catego."'");
            $pro=$producto->getFilter($filter);
            break;
    }

    $tabla = $tabla . '<h4 class="f-primary-b b-h4-special f-h4-special c-primary">' . $title . '</h4>';
    foreach ($pro as $prod) {
        $valor = number_format($prod->valor, 2, ',', '.');

        $tabla = $tabla . '<div class="col-md-4 col-sm-4 col-xs-6 col-mini-12">
        <div class="b-product-preview">
            <div class="b-product-preview__img view view-sixth">';
        $img = $imagen->getByProd($prod->id);
        $tabla = $tabla . '               <img data-retina src="Administer/public/img/' . $img[0]->imagen . '" alt=""/>
                <div class="b-item-hover-action f-center mask">
                    <div class="b-item-hover-action__inner">
                        <div class="b-item-hover-action__inner-btn_group">
                            <a  class="b-btn f-btn b-btn-light f-btn-light info addCart2" data-img="' . $img[0]->imagen . '" data-modi="modi" data-idclasif="0" data-id="' . $prod->id . '" data-valor="' . $prod->valor . '" data-nombre="' . $prod->name . '"><i class="fa fa-shopping-cart"></i></a>
                            <a href="MS-shop_detail.php?id='.$prod->id.'" class="b-btn f-btn b-btn-light f-btn-light info "><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="b-product-preview__content">

                <div class="b-product-preview__content_col">';
        $cap = $cat->getById($prod->categoria);
        $tabla = $tabla . '<a href="MS-shop_detail.php?id=' . $prod->id . '" class="f-product-preview__content_title">' . $prod->name . '</a>
                    <div class="f-product-preview__content_category f-primary-b"><a href=""><i class="' . $cap->img . '"></i> ' . $cap->nombre . '></a> </div>
                </div>
                <div class="b-product-preview__content_col">
                    <span class="b-product-preview__content_price f-product-preview__content_price f-primary-b">$ ' . $valor . '</span>
                </div>
            </div>
        </div>
    </div>';
    }
    $tabla = $tabla . '<div class="clearfix visible-xs-block"></div>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>