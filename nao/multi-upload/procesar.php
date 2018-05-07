<?php
require "../producto/Productos.php";
header("Content-Type: text/html;charset=utf-8");
$mensage = '';

foreach ($_FILES as $key){
    if($key['error'] == UPLOAD_ERR_OK ){//Si el archivo se paso correctamente Ccontinuamos 		
        $fecha= date("Y-m-d");
        $carpeta = "tmp_excel/";
        $excel = $fecha."-".$key['name'];
        move_uploaded_file($key['tmp_name'], "$carpeta$excel");
    }
    $row = 1;
    $fp = fopen ("$carpeta$excel","r");
    
    //fgetcsv. obtiene los valores que estan en el csv y los extrae.
    while ($data = fgetcsv ($fp, 1000, ";"))    {
        //si la linea es igual a 1 no guardamos por que serian los titulos de la hoja del excel.
        if ($row!=1)
        {
            $num = count($data);
            
            $categoria=  Productos::getCat(utf8_encode($data[8]),$data[9]);
            $valor=ereg_replace("[^0-9]", "", $data[5]);
            $iva=ereg_replace("[^0-9]", "", $data[6]);
            $neto=ereg_replace("[^0-9]", "", $data[7]);
            echo $neto;
            if(!$categoria){
                $crearcat=  Productos::insertCat($data[9],utf8_encode($data[8]));
                $categoria=  Productos::getCat(utf8_encode($data[8]),$data[9]);
            }
            $ref=  Productos::getProByRef(utf8_encode($data[1]));
            
            if($ref){
                $Pro=  Productos::update($ref['idProducto'],$categoria['idCategoria'],utf8_encode($data[0]),utf8_encode($data[1]),utf8_encode($data[2]),utf8_encode($data[3]),utf8_encode($data[4]),$valor,$iva,$valor);
                
            }else{
               
                $Pro=  Productos::insert($categoria['idCategoria'],utf8_encode($data[0]),utf8_encode($data[1]),utf8_encode($data[2]),utf8_encode($data[3]),utf8_encode($data[4]),$valor,$iva,$neto);
                
            }
            if (!$Pro){
                $mensage .= "<div>Hubo un problema al momento de importar porfavor vuelva a intentarlo</div >".$neto;
            }
           
        }
        $row++;
    }
    fclose ($fp);
    $mensage.= "<div>Los productos fueron importados exitosamente, un total de ".$row."</div >";
}
echo $mensage;
?>