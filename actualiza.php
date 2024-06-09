<?php # Script 4.3 - actualiza.php
	$page_title = 'Actualización!';
	$mensaje='';	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="includes/style.css?v=1.0" media="screen" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
	<meta charset="utf-8" />
</head>
<body>
<div id="content">
	<?php 	// Script: header.html
		include ('./includes/header.html');
	?>
	<!-- Contenido principal de registro de usuarios. -->
	<h1 id="principal">Programación de la solicitud</h1>

	<!-- Llamar el Script para mostrar los usuarios -->
	<?php include('modulos/actualizar.php');
		
	?>
	<?php //echo $mensaje; ?>

	<?php //tablas($id_sol); ?>
</div>
	<?php 	// Script: footer.html
		include ('./includes/footer.html');
	?>
</body>
</html>