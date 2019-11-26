<?php
include_once 'logic.php';

if(!empty($_POST["sid"]) && !empty($_POST["PIN"]))
{
    
    $usuarioex = $_POST["sid"];  
    //$perfilex = darPerfilUsuario($usuarioex);
    //$estadoex = darEstadoUsuario($usuarioex);   
    
    $valido = autenticar($_POST["sid"], $_POST["PIN"]);
    //$valido = TRUE; //COMENTAR EN PROD
    //if(($estadoex != "INVALIDO"  && $valido)  || ($_POST["PIN"] == "uss-ci-2300844"))
    if($valido)
    {
		$error1 = "";
        session_start();
        $_SESSION['usuarioex'] = $usuarioex;
        // $_SESSION['perfilex'] = $perfilex;
        // $_SESSION['estadoex']= $estadoex;
        header ("Location: /Interactiva_InterpolRedNotesPHP/inicio.php");
    }
    else {
		
        $error1 = "No se encuentra habilitado para usar este servicio o sus credenciales son incorrectas.";
		session_start();
        session_register("error1");
		header ("Location: /index.php");
    }
}
?>
