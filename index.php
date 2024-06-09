<?php # Script 4.1 - index.php
	$page_title = 'NearShore - Hotel Clean';
	$mensaje='';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="includes/style.css?v=1.0" media="screen" />
	<meta charset="utf-8" />
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
	<script type="text/javascript" src="./includes/script.js"></script>
	<!-- Contenido principal -->
	<h1 id="principal">Problema: NearShore - Hotel CleanL</h1>
	<h3>Descripción del problema:</h3>
	<p>En el ambiente de las empresas que requieren servicios de limpieza es importante optimizar los recursos(tiempo, personal, etc.). HOTEL CLEAN es una aplicación Web que busca hacer eficiente la gestión de labores de limpieza y sanitización de habitaciones a las empresas de la industria hotelera.</br></br></p>

</div>
	<?php 	// Script: footer.html
		echo $mensaje;
		include ('./includes/footer.html');
	?>
</body>
</html>