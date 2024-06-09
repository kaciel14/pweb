<?php # Script 4.11

function lista_habitaciones() {


	require 'mysqli_connect.php';
	$query = "SELECT * from habitacion";

	$resultado = @mysqli_query($conexion, $query);

	
	//echo $resultado['habitacion'];

	echo '<p>Habitación: <select class="select-color" name="habitaciones">';
	while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		echo '<option value ="'.$fila['id'].'"';
		
		if (isset($_POST['habitaciones'])&&
			$_POST['habitaciones'] == $fila['id']) {
			echo 'selected="selected"';
		}
		
		echo '>'.$fila['habitacion'].'</option>';
	}
	echo '</select></p>';			
	mysqli_close($conexion);
} 

// Verificar que se envió el formulario
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$mensaje='';
	//$mensaje .= '<p class="hizo">Registro enviado</p>';
	// Conectar a la Base de Datos
	require 'mysqli_connect.php';	
	// Preparar la consulta para registrar los datos en la tabla 'users'
	$area= $_POST['habitaciones'];
	$query = "INSERT INTO solicitud (area, estado)
				VALUES ('$area', 'sin programar')";
	// ejecutar la consulta
	$resultado = @mysqli_query($conexion,$query);
	//Si la consulta tuvo éxito, entonces imprimir un mensaje
	if ($resultado) {
		$mensaje.='<p class="hacer">Registro exitoso</p>';;
	}
	//Pero si no tuvo éxito mandar el mensaje correspondiente
	// Debugging message:
	else{
		$mensaje.='<p class="error">No se pudo registar </br>';
		$mensaje.='Motivo: '. mysqli_error($conexion).'</p>';
	}

	// Cerrar la conexión a la base de datos
	mysqli_close($conexion);
}

?>