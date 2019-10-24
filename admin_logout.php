<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
header("location: admin_login.php");
exit;
?>

