<?php 
session_start();
?>
<!DOCTYPE html>
<HTML lang="es">
<?php 
	include("header.php");
	if(isset($_SESSION["usuarioex"]))
	{
		session_start();
		header ("Location: /AdministradorInformacionUniandes/inicio.php");
	}
	else
	{
?>
	<div class="container-fluid top-margined">
	
		<div class="row">
    			<div class="col-md-1">
    			
    			</div>
    			<div class="col-md-3">
					<?php if( isset($_SESSION['error1']) && $_SESSION['error1'] != "") { ?>							
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> 
							<br />
							<?php echo $_SESSION['error1']; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>
					<?php 
						$error1 = "";
						session_register("error1");
					
					} ?>
			
    				<div class="cardlog card-container text-center">
						<br>
						<br>
						<h4 id="profile-name" class="profile-name-card text-center">REGISTRARSE</h4>
						<img src="./img/dev_img.png" alt="Interpol Icon" class="img-about-circular">
						<form class="form-ingreso" action="register.php" method="post" NAME="signupform" AUTOCOMPLETE="OFF">
							<span id="reauth-email" class="reauth-email"></span>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="sid" size="22" maxlength="20" ID="UserID" class="form-control" placeholder="Usuario" required autofocus>
							</div>
							<div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" size="22" maxlength="20" ID="email" class="form-control" placeholder="correo" required autofocus>
							</div>
							<div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
								<input type="password" name="PIN" id="PIN" size="43" maxlength="42" class="form-control" placeholder="Clave" required>
							</div>
							<div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
								<input type="password" name="CONFIRM_PIN" id="COMFIRM_PIN" size="43" maxlength="42" class="form-control" placeholder="Confirma la clave" required>
                            </div>
							<button class="btn btn-lg btn-primary btn-block btn-ingreso" type="submit">Registrarme <i class="fa fa-door-open"> </i></button>
						</form>	
						<small>¿Ya tienes una cuenta? <a href="index.php">Ingresa</a></small>
						<br />
						<br />
						<br />
					</div>
					<br />
					<br />
					<br />
					<br />
    			</div>
    			<div class="col-md-8">
					<h1 class="h-amarillo" style="text-align: center">Sistema de consulta de notificaciones rojas de Interpol</h1>
					<p class="text-center">
						Este sistema le permitirá consultar bajo diferentes categorias las notificaciones rojas expedidas por la Interpol.
						<br />
						<br />
					</p>
					<div class="row">	
						<div class="col-md-12 text-center">
							<img src="./img/signup_wallicon.jpg" alt="Interpol Wallpaper" class="img_signup">
						</div>
					</div>	
				</div>
    		</div>
    	</div>    				
    		<br />
	</div>
<?php 
   include("footer.php");
   }
?>

</html>
