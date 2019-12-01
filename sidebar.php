<nav id="sidebar">
	<div class="sidebar-header text-center">
		
		<img src="./img/sidebar_icon.jpg" alt="police_badge" class="img-circular">
		<p class="text-center">
		<span class="title-sideheader"><br />
			Sistema de información de notificaciones rojas de Interpol</span><br />
		<span class="subtitle-sideheader">T&T Interactiva S.A.S</span></p>
		</strong><hr>

		<a id="sidebarCollapse_1" href="#" data-toggle="sidebar-colapse" class="list-group-item list-group-item-action d-flex">
			<span><i id="collapse-icon" class="fas fa-angle-double-left"></i></span>&nbsp;
		</a>
	</div>

	
	<ul class="list-unstyled components polished">
		<li>
			<a href="start.php"><i class="fa fa-home"></i>&nbsp;Inicio</a>
		</li>
		<li>
			<a href="#Perfil" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
				<i class="fas fa-user"></i>&nbsp;Administrar 
			</a>
			<ul class="collapse list-unstyled sided" id="Perfil">
				<li>
					<a href="updateAccount.php"><i class="fa fa-pen"></i>&nbsp;Modificar datos</a>
				</li>
				<li>
					<a href="list.php"><i class="fa fa-list-ul"></i>&nbsp;Mis consultas</a>
				</li>
			</ul>
		</li>
		
		<li>
			<a href="logout.php">
				<i class="fas fa-sign-out-alt "></i>
				Salir
			</a>
		</li>
	</ul>
	
</nav>