<?php
session_start();
?>
<!DOCTYPE html>
<HTML lang="es">
<?php
   include_once 'logic.php';
   include("header.php");
   if(isset($_SESSION["usuarioex"])) {
?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark2">
		<div class="container-fluid">
			<button type="button" id="sidebarCollapse" class="btn btn-uniandes d-inline-block d-lg-none" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-align-left"></i>
			</button>
			&nbsp;&nbsp;
			<br />
			<h3 class="faded"><i class="fas fa-home"></i>&nbsp;INICIO</h3>
		</div>
	</nav>
	
    <div id="main" class="row">
		<div class="col-lg-12 col-md-12 col-xs-12 form">
            <h3>Buscar</h3>
            <form class="form-box" autocomplete="off" method="post" action="configuracionPosgrado.php">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-xs-12 margined">
                    <div class="form-group">
                        <strong><label for="name">Nombre</label></strong>
                        <input type="text" class="form-control" id="name" placeholder="Pepito">
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-xs-12 margined">
                    <div class="form-group">
                        <strong><label for="forename">Apellido</label></strong>
                        <input type="text" class="form-control" id="forename" placeholder="Perez">
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-xs-12 margined">
                    <div class="form-group">
                        <strong><label for="nationality">Nacionalidad</label></strong>
                        <select id="nationality" class="form-control" placeholder="pais">
                            <option name="nothing" value=""> Seleccionar pais...</option>
                        </select>                    
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-xs-12 margined">
                    <div class="row">
                        <label for="ageMin" class="col-12"><strong>Edad actual</strong></label>
                        <input type="number" class="form-control col-3" id="ageMin" name="ageMin" placeholder="0" min="0">
                        <label for="ageMax" class="col-3 text-center">a</label>
                        <input type="number" class="form-control col-3" id="ageMax" name="ageMax" placeholder="120" min="0">
                    </div>
                </div>
            </form>
        </div>
        <br>
        <hr/>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <h3>Resultados de busqueda</h3>
            <div id="query_results"class="row">
                <!-- For each result it will be printed a card with the profile of the subject-->
            </div>
        </div>
	</div>

<?php } else {	?>
 <div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
		<div class="alert alert-warning">
			<strong>Error!</strong>
			<br />
			Usted no ha iniciado sesi&oacute;n, o no est&aacute; autorizado para usar este servicio o su sesi&oacute;n ha expirado.
			Volver a la p&aacute;gina principal <a href="./index.php">AQU&Iacute;</a>.
			<br /><br />
			Para cualquier duda o inquietud por favor enviar un correo a: <a href="mailto:alvar-go@uniandes.edu.co">alvar-go@uniandes.edu.co</a>.
		</div>
	</div>
	<div class="col-md-1">
	</div>
</div>
<?php   } ?>
<?php
    include("footer.php");
?>

</html>