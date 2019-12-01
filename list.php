<?php
session_start();
header('Access-Control-Allow-Origin: *')
?>
<!DOCTYPE html>
<HTML lang="es">
<?php
   include_once 'logic.php';
   include("header.php");
   if(isset($_SESSION["usuarioex"])) {

    $data = getUserData();    
?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark2">
		<div class="container-fluid">
			<button type="button" id="sidebarCollapse" class="btn menu d-inline-block d-lg-none"  aria-expanded="false" aria-label="Toggle navigation">
				<i id="menu-icon" class="fas fa-align-left"></i>
			</button>
			&nbsp;&nbsp;
			<br />
			<h3 class="faded"><i class="fas fa-list"></i>&nbsp;Mis consultas</h3>
		</div>
	</nav>
	
    <div id="main" class="row">
		<div class="col-lg-12 col-md-12 col-xs-12 form">
			<h3>Tabla de consultas</h3>
			<div class="col-lg-12 col-md-12 col-xs-12" id="deletion_info">

			</div>
            <?php printQuerysTable($_SESSION['usuarioex']) ?>
        <br>
        <hr/>
	</div>

	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header ">
					<h3><strong><i class="fas fa-exclamation-triangle"></i> Cuidado</strong></h3>
				</div>
				<div class="modal-body">
					Está apunto de borrar la consulta <strong id="delete_consult" val=""></strong>, se eliminará de todos los registros en la base 
					de datos ¿Está seguro que desea hacerlo?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button class="btn btn-danger btn-ok" onclick="executeDeletion()">Borrar</button>
				</div>
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