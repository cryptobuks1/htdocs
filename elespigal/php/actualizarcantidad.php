<?php
@session_start();

if($_SESSION['cantidad']==0 || !isset($_SESSION['carrito'])){
    echo "<script>
        $('.cantCart').fadeOut();
        </script> 
        0
    ";
}else{
    $c=$_SESSION['cantidad'];
    echo"
        <script>
        $('.cantCart').fadeIn();
        </script> 
        ".$c."";
}
?>
