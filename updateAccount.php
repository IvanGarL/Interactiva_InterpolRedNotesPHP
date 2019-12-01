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
			<button type="button" id="sidebarCollapse" class="btn menu d-inline-block d-lg-none" aria-expanded="false" aria-label="Toggle navigation">
				<i id="menu-icon" class="fas fa-align-left"></i>
			</button>
			&nbsp;&nbsp;
			<br />
			<h3 class="faded"><i class="fas fa-user"></i>&nbsp;<?php echo $_SESSION['usuarioex']?></h3>
		</div>
	</nav>
	
    <div id="main" class="row">
		<div class="col-lg-12 col-md-12 col-xs-12 form">
            <h3>Cambiar datos</h3>
            <form class="form-box" autocomplete="off" method="post" action="profile.php">	
                <input type="hidden" id="user" name="user" value=<?php echo $_SESSION['usuarioex']?>>			
                <div class="row form-padded">
                   <div class="col-lg-6 col-md-6 col-xs-12">
                        <img src="./img/dev_img.png" alt="Interpol Icon" class="img-profile">
                   </div>
                   <div class="col-lg-6 col-md-6 col-xs-12">
                        <h4>Datos personales</h4>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $data['username']?>" aria-label="" aria-describedby="button-username" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="button-username" onclick="enableInput(username)"><i class="fas fa-edit"></i>&nbsp;Editar</button>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="email" name="email" placeholder="<?php echo $data['email']?>" aria-label="" aria-describedby="button-email" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="button-email" onclick="enableInput(email)"><i class="fas fa-edit"></i>&nbsp;Editar</button>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nueva contraseña" aria-label="" aria-describedby="button-username" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="button-new_password" onclick="enableInput(new_password)"><i class="fas fa-edit"></i>&nbsp;Editar</button>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña actual" aria-label="" aria-describedby="button-username" required/>
                        </div>
                        <input type="submit" id="update-data" class="btn btn-success btn-lg btn-block" value="Actualizar" disabled></input>
                   </div>
                </div>
            </form>
        <br>
        <hr/>
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