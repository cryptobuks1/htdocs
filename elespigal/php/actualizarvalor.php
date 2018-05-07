<?php
@session_start();

$domicilio = number_format(1.5,2);
if($_SESSION['total']==$domicilio){
echo"
    <a href='menu.php' class='btnsinp rpedido'>Realizar Pedido<div class='cargando '><i class='fa fa-spinner fa-pulse'></i></div></a>
    <div class='eligeloque'>
        <img src='imagenes/elige.jpg' alt='Elige lo que más te guste'/>
    </div>";
}else{
    if(isset($_GET['deliv'])){
        $_SESSION['delivery']['delv']=$_GET['deliv'];
        $_SESSION['delivery']['v']=number_format($_GET['v'],2);
        $_SESSION['total']=number_format($_SESSION['suma']+$_SESSION['delivery']['v'],2);
    }
   
echo"
    
    <section id='subtotal' class='prefooterinfo '>
        <div class='description ttotalcart'>Total</div>
        <div class='totalGlobal totalcart'>$<span>".$_SESSION['suma']."</span></div>
    </section>
    <section class='delivery' class='prefooterinfo '>";
        if($_SESSION['delivery']['delv']=='Domicilio'){ 
        echo "
        <div class='recoger'>
            <input type='radio'  name='delive' value='0' data-deliv='Recoger'/>
            <div class='tideliv'>Para recoger</div>
        </div>
        <div class='deliv'>
            <input type='radio'  name='delive' value='".$domicilio."' data-deliv='Domicilio' checked/>
            <div class='tideliv'>Domicilio <i>$</i><span>".$_SESSION['delivery']['v']."</span></div>
        </div>";
       }else{ 
        echo "
        <div class='recoger'>
            <input type='radio'  name='delive' value='0' data-deliv='Recoger'  checked/>
            <div class='tideliv'>Para recoger</div>
        </div>
        <div class='deliv'>
            <input type='radio'  name='delive' value='".$domicilio."' data-deliv='Domicilio'/>
            <div class='tideliv'>Domicilio   <i>$</i><span>".$_SESSION['delivery']['v']."</span></div>
        </div>";
       }
    echo" </section>
    <div class='mensajedelivery'></div>
    <section id='total' class='prefooterinfo '>
        <div class='description'>Total + Domicilio</div>
        <div class='total totalGlobal'>$<span>".$_SESSION['total']."</span></div>
    </section>";
    if($_SESSION['suma']>-1){
    echo"<a href='carrito.php' class='boton rpedido'><span class='icon-car carbtn'></span>Realizar Pedido<div class='cargando '><i class='fa fa-spinner fa-pulse'></i></div></a>";
    }else{
        echo"<a href='carrito.php' class='boton  rpedido'>Realizar Pedido (<small>mínimo $8</small>)</a>";
    }
}   

?>