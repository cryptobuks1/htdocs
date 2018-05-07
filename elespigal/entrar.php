<?php
	if($_POST['user']=="espigal" && $_POST['pass']=="321"){
		echo "
		<meta http-equiv='refresh' content='1; url=index1.php'>
		" ;
	}else{
		echo "
		<center>Usuario o Password no valido</center>
		<meta http-equiv='refresh' content='5; url=index.php'>
	" ;	
	}
?>