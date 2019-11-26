<?php

function autenticar($login, $clave){
    //TODO: complete auth with JWT
    return true;
}

function conectarseDB() {
	$conx = pg_connect("host=localhost port=5432  user=postgres dbname=interpol password=admin")
		or die ( 'No se puede conectar al servidor.' ); 
	return $conx;
}

?>
