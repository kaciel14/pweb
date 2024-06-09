<?php # Script 4.14
$mensaje='';
// Verificar que se envió el formulario
if($_SERVER['REQUEST_METHOD']=='POST'){
	// Conectar a la Base de Datos
	require 'mysqli_connect.php';
	// Preparar la consulta para actualizar los datos
	$id = $_POST['id_solicitud'];

	$query = "DELETE FROM limpieza WHERE id_solicitud=$id";
	// Ejecutar la consulta	
	$resultado = @mysqli_query($conexion, $query);
	// Si la consulta tuvo éxito, entonces imprimir un mensaje
	if($resultado){
		$query = "DELETE FROM solicitud WHERE id=$id";
		$resultado = @mysqli_query($conexion, $query);
		if($resultado){
			$mensaje.='<p class"hacer">Solicitud eliminada</p>';
		}
	}
	// Pero si no tuvo éxito mandar el mensaje correspondiente	
	else{
		$mensaje.='<p class"error>No se pudo eliminar la solicitud</br>
		Motivo: '.mysqli_error($conexion).'</p>"';
	}
	// Cerrar la conexión a la base de datos
	mysqli_close($conexion);	

}
// Si no se envió el formulario mostrar los datos del usuario
elseif(!empty($_GET['id_solicitud'])){
	// Conectar a la Base de Datos
	require 'mysqli_connect.php';
	// Preparar la consulta para obtener los datos asociados al ID
	$id=$_GET['id_solicitud'];
	//$mensaje="<p>El usuario elegido tiene ID=$id</p>";
	$query = "SELECT habitacion, programada, estado, solicitud.id FROM solicitud JOIN habitacion ON habitacion.id = solicitud.area WHERE solicitud.id = $id";
	// ejecutar la consulta
	$resultado = @mysqli_query($conexion, $query);
	// obtener el registro
	$num = mysqli_num_rows($resultado);
	//Si la consulta tuvo éxito, entonces mostrar el formulario con datos
	if($num > 0){
		$datos = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$mensaje.='<p>Habitación: '.$datos['habitacion'].'</p>
			<p>Programada: '.$datos['programada'].'</p>
			<p>Estado: '.$datos['estado'].'</p>
			<form action="elimina.php" method="POST">
			<input type="hidden" name="id_solicitud" value="'.$id.'"/>
			<p><input type="submit" name="submit" value="Eliminar" /></p>
			</form>';
	}		
	//Pero si no tuvo éxito mandar el mensaje correspondiente
	else{
		$mensaje.='<p class="error">No se pudo obtener la información del usuario</p>';
	}
	// Liberar el recurso
	mysqli_free_result($resultado);
	// Cerrar la conexión a la base de datos
	mysqli_close($conexion);
}else{
	$mensaje.='<p class="error">No se pudo obtener la información del usuario</p>';
}	
?>