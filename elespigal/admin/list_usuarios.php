<?php 
@session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){
	include "headeradmin.php";
	include "php/config.php";
	$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
	mysqli_set_charset($conexion, "utf8");
	
	?>
  <div class="cont2">
	<div class="seccion1">
            <div class="consulta"> 
        	<h1>Consulte por cédula</h1>
                <div class="img_sol">
                    <div class="buscar">
                        <input class="buscar_placa" type="text" name="buscarl" placeholder="Ingrese una cédula sin espacios"/>
                        <a class="ico_buscar">Buscar</a>
                    </div>
                </div>
            </div>
            <div class="listado_usuarios">
       		<h3>Usuarios</h3>
            <?php $peticion = "SELECT * FROM usuarios";
            $resultado = mysqli_query($conexion, $peticion);
            echo"<article class='resulest' id='estindex'>
			<table cellspacing='0' class='tablauser'>
            <tr><th>CI</th><th>TIPO_USER</th><th>NOMBRES</th><th>DIR</th><th>TELEF</th><th>MAIL</th><th>REF</th></tr>";
            while($fila = mysqli_fetch_array($resultado)){
			echo "
            <tr>
            <td>".$fila['ci']."</td><td>".$fila['tipo_user']."</td><td>".$fila['nombre']."</td><td>".$fila['dir']."</td><td>".$fila['tel']."</td><td>".$fila['mail']."</td><td>".$fila['referencia']."</td>
            </tr>
            ";
            }
			echo"
			</table>
			</article>";
			?>

        </div>
	</div>
    
<?php
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
  </div>