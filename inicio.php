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
	
	<div id="main" class="row" style="margin-left:1px">
		<div class="card beauty"">
			<div class="card-body">
				<h5 class="h-negro"><i class="fas fa-home "></i>&nbsp;PPP</h5>
				<p class="card-text"></p>
				<a href="configuracionPregrado.php" class="btn btn-primary">Configurar</a>
			</div>
		</div>

		<div class="card beauty">
			<div class="card-body">
				<h5 class="h-negro"><i class="fas fa-user-graduate "></i>&nbsp;PPP</h5>
				<p class="card-text"></p>
				<a href="configuracionPosgrado.php" class="btn btn-primary">Configurar</a>
			</div>
		</div>

		<div class="card beauty">
			<div class="card-body">
				<h5 class="h-negro"><i class="fas fa-calendar "></i>&nbsp;PPP</h5>
				<p class="card-text"></p>
				<a href="configuracionPeriodos.php" class="btn btn-primary">Configurar</a>
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