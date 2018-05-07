<?php 
@session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){
include "php/config.php";
 include "headeradmin.php";
?>
<div class="contnuevopro">
    <div class="seccion1">	
        <div class="barramenulista">
                <h1 class="titulomenu">Mensajes</h1>
            </div>
        </div>
        <div class="titulo_edit_prod">
		</div>
        <div class="ralla"></div>
        <div class="datosgeneralescat">
            <form action="php/modificarmen.php" method="post" >
                <?php
    
                $conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
                mysqli_set_charset($conexion, "utf8");
						$i=0;
                        $peticion2 = "SELECT * FROM mensajes";
                        $resultado2 = mysqli_query($conexion, $peticion2);
                        echo"<table>
						<tr><td colspan=8><h2>Modificar Mensaje</h2></td></tr>
                        <tr><th>Asunto</th><th>mensaje</th></tr>";
                        while($fila2 = mysqli_fetch_array($resultado2)){
                        echo"	
                                <tr>";
									echo" 
									<td style='width:20%';>".$fila2['asunto']."</td>
									<td style='width:80%';><textarea class='text-mensajes' type='text' name='mensaje".$i."'>".$fila2['mensaje']."</textarea></td>
                                    <input type='hidden' name='id".$i."' value='".$fila2['id_men']."'/>
                                </tr>
                            ";
                        $i++;}
                    echo" </table>";?>
				<input class="modcat" type='submit' value='Modificar Mensaje'/>
			</form>            
			
		</div>
	</div>
</div>
<?php
mysqli_close($conexion);
	}else{
		echo "
			<meta http-equiv='refresh' content='0; url=index.php'>
		" ;
	}
}else{
	echo "
		<meta http-equiv='refresh' content='0; url=loguinadmin.php'>
	" ;
	
}?>


