<?php # Script 4.4 - elimina.php
	$page_title = 'Elimina!';
	$mensaje='';	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="includes/style.css?v=1.0" media="screen" />
	<meta charset="utf-8" />
</head>
<body>
<div id="content">
	<?php 	// Script: header.html
		include ('./includes/header.html');
	?>
	<!-- Contenido principal de eliminación de usuarios. -->
	<h1 id="principal">Eliminación de usuarios</h1>

	<!-- Hacer la llamada al módulo eliminar.php -->
	<?php include('modulos/eliminar.php'); ?>
	<?php echo $mensaje; ?>
</div>
	<?php 	// Script: footer.html
		include ('./includes/footer.html');
	?>
</body>
</html>