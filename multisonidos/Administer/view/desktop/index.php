<?php
session_start();
if(isset($_SESSION['user'])){
    if($_SESSION['user']['tipo']==1){
        header('Location: pedidos.php' );
    }else{
        header('Location: ../login/login.php' );
    }
}else{
    header('Location: ../login/login.php' );
}
?>