<?php
// *** Logout the current user.
$logoutGoTo = "index.php";
session_start();
unset($_SESSION['Administer6638f5287ecf7b5c2d2c87774pro2']);
unset($_SESSION['926937b35064856068781dcd2a140987']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
session_unregister('Administer6638f5287ecf7b5c2d2c87774pro2');
session_unregister('926937b35064856068781dcd2a140987');

exit;
}
?>
