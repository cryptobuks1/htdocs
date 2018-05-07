<form action="prueba.php" method="post">
<input type="date" name="fecha"/>
<input type="submit" value="enviar"/>
</form>
<?php 
$date=$_POST['fecha'];
$daten=0;
$daten=strtotime($date);
echo $daten;
?>