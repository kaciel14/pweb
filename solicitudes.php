<?php # Script 4.3 - usuarios.php
	$page_title = 'Usuarios!';
	// Llamar al módulo consultar.php
	include 'modulos/consultar.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="includes/style.css?v=1.0" media="screen" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
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
	<!-- Contenido principal de usuarios. -->
	<!--<h1 id="principal">Solicitudes Registradas</h1>-->

	<!-- Llamar el Script para mostrar los usuarios -->
	<?php mostrarDatos($num, $resultado);
		mysqli_free_result($resultado);	
	 ?>
	
</div>
	<?php 	// Script: footer.html
		include ('./includes/footer.html');
	?>
</body>
</html>