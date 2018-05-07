<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_admin = "localhost";
$database_admin = "grupodee_bd";
$username_admin = "grupodee_user";
$password_admin = "grupodee_user";
$admin = mysql_connect($hostname_admin, $username_admin, $password_admin) or trigger_error(mysql_error(),E_USER_ERROR); 
?>