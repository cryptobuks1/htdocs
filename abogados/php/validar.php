<?php
require_once ('../db.class.php');

$user 		= $_POST['usuario'];
	
	$query = "SELECT COUNT(email) FROM users WHERE user=:user";

	$stmt = DB::getStatement($query);


	$stmt->bindParam(":user", $user, PDO::PARAM_STR);
	$result = $stmt->execute();
	$number_of_rows = $stmt->fetchColumn();

    if( $result->num_rows > 0)
        echo 0;
    else
        echo 1;
?>