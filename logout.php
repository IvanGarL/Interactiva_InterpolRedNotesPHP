<?php
//Recupera la session
session_start();
//Limpia las variables de session
session_unset();
//Destruye la session
session_destroy();
//Redirecciona a la p�gina de login
ob_start();
header ("Location: ./index.php");
ob_end_flush(); 
exit();
?>