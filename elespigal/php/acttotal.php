<?php
@session_start();
if(isset($_GET['del'])){
    $_SESSION['delivery']['delv']=$_GET['del'];
    $_SESSION['delivery']['v']=number_format($_GET['p'],2);
    $_SESSION['total']=number_format($_SESSION['suma']+$_SESSION['delivery']['v'],2);
}
echo $_SESSION['total'];
?>