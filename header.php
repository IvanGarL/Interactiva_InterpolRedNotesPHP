<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- mobile first boostrap -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<title>Interpol Red Sheets API</title>
		<meta HTTP-EQUIV="Pragma" content="no-cache">
		<meta HTTP-EQUIV="Cache-Control" content="no-cache">
	    <meta http-equiv="Content-Script-Type" name="Default_Script_Language" content="text/javascript">
		
		<link rel="shortcut icon" href="./img/interpol_icon.jpg" />
		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>		
		<!-- Popper.JS -->
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    	<!-- Bootstrap CSS CDN -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<!-- CSS propio -->
	   	<link rel="stylesheet" href="css/app.css">
		<!-- Icomoon Icon Fonts-->
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="css/icomoon.css">
        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>


	</head>
	
	
	<body>
	
		<?php if(!isset($_SESSION["usuarioex"]) ){ ?>
			<nav class="navbar navbar-default navbar-expand-md navbar-dark fixed-top">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExamenes" aria-controls="navbarsExamenes" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon" style="color:#181818;"></span>
				</button>
			</nav>
			<main role="main" class="main-externo">
		<?php }else{ ?>
			<div class="wrapper">
        <!-- Sidebar  -->
			<?php include("sidebar.php"); ?>
			
			 <!-- Page Content  -->
			<div id="content">
		<?php } ?>