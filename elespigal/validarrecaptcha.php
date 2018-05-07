<?php 
require_once('recaptchalib.php');
$privatekey = "6Lfo9wYTAAAAANnAblQsLm58GhSeQXIs69QH-oSh"; //lave privada
 $resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha-token"],$_POST["g-recaptcha-response"]);
 
 if (!$resp->is_valid) {
      //ERROR EN EL CAPTCHA
      echo 0;
 }else{
      //CAPTCHA CORRECTO
      echo 1;
 }

?>
