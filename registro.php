<?php # Script 4.2 - registro.php
	$page_title = 'Registro!';
	$mensaje='';
	
	include ('modulos/registrar.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="includes/style.css?v=1.0" media="screen" />
	<meta charset="utf-8" />
		<link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
</head>
<body>
<div id="content">
	<?php 	// Script: header.html
		include ('./includes/header.html');
	?>
	<!-- Contenido principal de registro de usuarios. -->
	<h1 id="principal">Registro de Usuarios</h1>

	<form action="" method="POST">
		<?php 
			lista_habitaciones();
			//mysqli_close($conexion);
		?>
		<p><input type="submit" name="submit" value="Registrar" class="select-color" /></p>
	</form>
	<?php echo $mensaje; ?>
</div>
	<?php 	// Script: footer.html
		include ('./includes/footer.html');
	?>
</body>
</html>