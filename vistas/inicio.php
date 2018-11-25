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
		<div class="container-title">
			<h1 class="container-title">Sistema de ventas de Electrodomesticos</h1>
			<img src="../img/logo2.png" class="img-fluid" alt="Responsive image" width="100px" height="100px">
		</div>
	</div>
</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>