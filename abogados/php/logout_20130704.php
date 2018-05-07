<?php

session_start();
session_destroy();

?>
<p>
        Ha cerrado sesión. En 5 segundos será redireccionado, <br>
        sino desea esperar haga click <a href ="../index.php">AQU��</a>
        <script type='text/javascript'>
                function redirect(){
                        window.location.href="../index.php";
                }
                setTimeout(redirect,5000);
        </script>
</p>

