<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>inicio</title>
	<?php require_once "menu.php"; ?>
</head>
<body>
	<div class="container container-home">
			<input type="hidden" class="active-btn" value="inicio">
		<div class="container-title">
			<h1 class="container-title">Sistema de ventas de Electrodomesticos</h1>
			<img src="../img/logo2.png" class="img-fluid" alt="Responsive image" width="100px" height="100px">
		</div>
		<div class="container-cover">
			<img src="../img/cover.jpg" class="img-fluid cover" alt="Responsive image" width="750px" height="500px">
		</div>
	</div>
</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>