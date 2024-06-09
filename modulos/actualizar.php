<?php # Script 4.31
$mensaje='';
$estados = ['sin asignar', 'programada', 'en proceso', 'terminada'];
// Verificar que se envió el formulario
if($_SERVER['REQUEST_METHOD']=='POST'){
	// Conectar a la Base de Datos
	require 'mysqli_connect.php';
	// Preparar la consulta para actualizar los datos
	$id_sol = $_POST['id_sol'];
	$prog = $_POST['programada'];
	$estado = $_POST['estado'];
	$query = "UPDATE solicitud SET programada='$prog', estado='$estado' WHERE id=$id_sol";
	// Ejecutar la consulta	
	$resultado = @mysqli_query($conexion, $query);
	// Si la consulta tuvo éxito, entonces imprimir un mensaje
	if($resultado){
		$mensaje.='<p class"hacer">Actualización exitosa</p>';	
	}
	// Pero si no tuvo éxito mandar el mensaje correspondiente	
	else{
		$mensaje.='<p class"error>No se pudo actualizar el registro</br>
		Motivo: '.mysqli_error($conexion).'</p>"';
	}
	// Cerrar la conexión a la base de datos
	mysqli_close($conexion);	
	echo $mensaje;
}	
elseif(!empty($_GET['id']) && !empty($_GET['id_solicitud'])){
	require 'mysqli_connect.php';

        $id = $_GET['id'];
        $id_sol = $_GET['id_solicitud'];
		
		if($_GET['accion'] === 'asignar'){
			$query = "INSERT IGNORE INTO limpieza (personal, id_solicitud) VALUES ('$id', '$id_sol')";
		}elseif($_GET['accion'] === 'desasignar'){
			$query = "DELETE IGNORE FROM limpieza WHERE personal = '$id' and id_solicitud = '$id_sol'";
		}
		
        $resultado = mysqli_query($conexion, $query);
		//mysqli_free_result($resultado);

		// Preparar la consulta para obtener los datos asociados al ID	
	$query = "SELECT habitacion, programada, estado FROM solicitud JOIN habitacion ON habitacion.id = solicitud.area WHERE solicitud.id = $id_sol";
	// Ejecutar la consulta	
	$resultado = mysqli_query($conexion, $query);
	// Obtener el registro	
	$num = mysqli_num_rows($resultado);
	// Si la consulta tuvo éxito, entonces mostrar el formulario con datos
	if($num > 0){
		// Extraer los datos de la consulta
		$datos = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		// Mostrar el formulario con los datos extraídos
		$mensaje.= ' 
		<form action="actualiza.php?id_solicitud='.$id_sol.'" method="POST">
			<p>Habitacion: '.$datos['habitacion'].'</p>
			<p>Programada: <input type="datetime-local" name="programada" value="'.$datos['programada'].'" /></p>'.
			'<p>Estado: <select name="estado">';
			foreach($estados as $estado){
				$mensaje.= '<option value ="'.$estado.'"';

				if($datos['estado'] === $estado){
					$mensaje.='selected="selected"';
				}

				$mensaje.= '>'.$estado.'</option>\n';
			}
			$mensaje.= '</select></p>';
			//.'<p>Estado: <input type="text" name="estado" value="'.$datos['estado'].'"/></p>'.
			$mensaje.= '<input type="hidden" name="id_sol" value="'.$id_sol.'"/>
			<p><input type="submit" name="submit" value="Modificar" /></p>
		</form>';
		echo $mensaje;
		echo '<br/><br/>';
		tablas($id_sol);
	}
	// Pero si no tuvo éxito mandar el mensaje correspondiente
	else{
		$mensaje.="<p class=\"error\">No se pudo obtener la información del usuario</p>";
		echo $mensaje;
	}
	// Liberar el recurso
	mysqli_free_result($resultado);
	// Cerrar la conexión a la base de datos
	mysqli_close($conexion);
}

// Si no se envío el formulario verificar si se solicitó la actualización
elseif(!empty($_GET['id_solicitud'])){
	// Conectar a la Base de Datos
	require 'mysqli_connect.php';
	// Preparar la consulta para obtener los datos asociados al ID	
	$id_sol = $_GET['id_solicitud'];
	$query = "SELECT habitacion, programada, estado FROM solicitud JOIN habitacion ON habitacion.id = solicitud.area WHERE solicitud.id = $id_sol";
	// Ejecutar la consulta	
	$resultado = mysqli_query($conexion, $query);
	// Obtener el registro	
	$num = mysqli_num_rows($resultado);
	// Si la consulta tuvo éxito, entonces mostrar el formulario con datos
	if($num > 0){
		// Extraer los datos de la consulta
		$datos = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		// Mostrar el formulario con los datos extraídos
		$mensaje.= ' 
		<form action="actualiza.php?id_solicitud='.$id_sol.'" method="POST">
			<p>Habitacion: '.$datos['habitacion'].'</p>
			<p>Programada: <input type="datetime-local" name="programada" value="'.$datos['programada'].'"/></p>'.
			'<p>Estado: <select name="estado">';
			foreach($estados as $estado){
				$mensaje.= '<option value ="'.$estado.'"';

				if($datos['estado'] === $estado){
					$mensaje.='selected="selected"';
				}

				$mensaje.= '>'.$estado.'</option>\n';
			}
			$mensaje.= '</select></p>';
			//.'<p>Estado: <input type="text" name="estado" value="'.$datos['estado'].'"/></p>'.
			$mensaje.= '<input type="hidden" name="id_sol" value="'.$id_sol.'"/>
			<p><input type="submit" name="submit" value="Modificar" /></p>
		</form>';
		echo $mensaje;
		echo '<br/><br/>';
		tablas($id_sol);
	}
	// Pero si no tuvo éxito mandar el mensaje correspondiente
	else{
		$mensaje.="<p class=\"error\">No se pudo obtener la información del usuario</p>";
		echo $mensaje;
	}
	// Liberar el recurso
	mysqli_free_result($resultado);
	// Cerrar la conexión a la base de datos
	mysqli_close($conexion);
}
// Pero si no se solicitó la actualización, mandar el mensaje correspondiente
else{	
	$mensaje.="<p class=\"error\">No existe el ID del usuario</p>";
	echo $mensaje;
}


function tablas($id_sol){
	require 'mysqli_connect.php';
	$datos = '';

	$query = "SELECT DISTINCT personal.id as id, CONCAT(nombre, ', ', apellido) AS persona FROM personal LEFT JOIN (SELECT DISTINCT personal, id_solicitud FROM limpieza LEFT JOIN 
	solicitud ON id_solicitud = solicitud.id WHERE id_solicitud = $id_sol) AS tabla1 ON personal.id = personal WHERE id_solicitud IS NULL OR id_solicitud != $id_sol";
	$resultado = @mysqli_query($conexion, $query);



	$datos.= '<table align="center" cellspacing="3" cellpadding="3" width="75%">
								<tr><td align="left"><b>Personal</b></td>
								<td align="left"><b>Asignar</b></td>
								</tr>';

								while($fila=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
									$datos.='<tr><td align="left">'.$fila['persona'].'</td>'.
									'<td align="left"><a href="actualiza.php?id='.$fila['id'].'&id_solicitud='.$id_sol.'&accion=asignar">'.
									'<i class="fa-solid fa-pen-to-square"></i></a></td></tr>';
								}

								$datos.= '</table>';

								echo $datos;


	echo '<br/><br/>';
	$datos = '';
	mysqli_free_result($resultado);

	$query = "SELECT id, CONCAT(nombre, ', ', apellido) AS persona FROM personal JOIN limpieza ON id = personal WHERE id_solicitud=$id_sol";	

	$resultado = @mysqli_query($conexion, $query);

	$datos.= '<table align="center" cellspacing="3" cellpadding="3" width="75%">
								<tr><td align="left"><b>Personal Asignado</b></td>
								<td align="left"><b>Eliminar</b></td>
								</tr>';

								while($fila=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
									$datos.='<tr><td align="left">'.$fila['persona'].'</td>'.
									'<td align="left"><a href="actualiza.php?id='.$fila['id'].'&id_solicitud='.$id_sol.'&accion=desasignar">'.
									'<i class="fa-solid fa-trash-can"></i></a></td></tr>';
								}
								$datos.= '</table>';

								echo $datos;
	mysqli_close($conexion);
}
?>