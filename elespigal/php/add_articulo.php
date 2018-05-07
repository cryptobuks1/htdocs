<?php
include './mysql.php';
include './clasearticulo.php';

//$nomb = $_POST["descrip_art"];
//$art = new ClaseArticulo($nomb);
//$nombre = $art->getNombre();

$db = new MySQL();
$consulta=$db->consulta("INSERT INTO articulo (id, codigo, descripcion, linea, costo, costoPromedio, pvp1, pvp2,pvp3,pvp4,pvp5,pvp6,stockMinimo,stockMaximo,existencia,pagaIva,compra,venta,costoVenta, comision,stockeable,barras,idTalla,Matriz,idMarca,colores,genero,factor,observacion,idCategoria,idFamilia,rangoTallas,idColor,reservado,venderBajoCosto,descuento,NoPagaComision,fob,idProveedor,idPartidaArancelaria,habilitado,idImpuestoEspecifico,recibeMedidas,idArticuloReal,utilidad,utilidad2,exigirLote,idArticuloPlantilla,idRequisito) VALUES (NULL, '".$_POST['cod_art']."' , '".$_POST['descrip_art']."' , '".$_POST['linea_art']."' , '".$_POST['costo_art']."', '".$_POST['costoprom_art']."' , '".$_POST['pvp1_art']."' , '".$_POST['pvp2_art']."' , '".$_POST['pvp3_art']."' , '".$_POST['pvp4_art']."' , '".$_POST['pvp5_art']."' , '".$_POST['pvp6_art']."' , '".$_POST['stmin_art']."' , '".$_POST['stmax_art']."' , '".$_POST['existencia_art']."' , '".$_POST['pagaiva_art']."' , '".$_POST['compra_art']."' , '".$_POST['venta_art']."' , '".$_POST['costoventa_art']."' , '".$_POST['comision_art']."' , '".$_POST['stockeable_art']."' , '".$_POST['barras_art']."' , '".$_POST['idtalla_art']."' , '".$_POST['matriz_art']."' , '".$_POST['idmarca_art']."' , '".$_POST['colores_art']."' , '".$_POST['genero_art']."' , '".$_POST['factor_art']."' , '".$_POST['observacion_art']."' , '".$_POST['idcategoria_art']."' , '".$_POST['idfamilia_art']."' , '".$_POST['rangotallas_art']."' , '".$_POST['idcolor_art']."' , '".$_POST['reservado_art']."' , '".$_POST['venderbajocosto_art']."' , '".$_POST['descuento_art']."' ,  '".$_POST['nopagacomision_art']."' , '".$_POST['fob_art']."' , '".$_POST['idproveedor_art']."' , '".$_POST['idpartidaarancelaria_art']."' , '".$_POST['habilitado_art']."' , '".$_POST['idimpuestoespecifico_art']."' , '".$_POST['recibemedidas_art']."' , '".$_POST['idarticuloreal_art']."' , '".$_POST['utilidad_art']."' , '".$_POST['utilidad2_art']."' , '".$_POST['exigirlote_art']."' , '".$_POST['idarticuloplantilla_art']."' , '".$_POST['idrequisito_art']."')");

header('Location: tablaArticulos.php');
