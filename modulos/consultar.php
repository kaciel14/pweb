<?php # Script 4.21 consulta de usuarios registrados

	// Conectar a la Base de Datos
	require 'mysqli_connect.php';

	// Preparar la consulta para obtener los usuarios registrars
	$query = "SELECT habitacion, programada, estado, solicitud.id FROM solicitud JOIN habitacion ON habitacion.id = solicitud.area";
	
	// Ejecutar la consulta
	$resultado = @mysqli_query($conexion, $query);


	// Obtener los registros
	$num = @mysqli_num_rows($resultado);
		
	// Cerrar la conexión a la base de datos
	mysqli_close($conexion);
	
	// Función para mostrar los datos de la consulta
	
			function mostrarDatos($numero, $solicitudes){
				$datos = '';
				if($numero > 0){
					// mostrar la cantidad de registros obtenidos
					$datos.="<p>Actualmente hay $numero solicitudes</p>";
					
				/*	// diseñar la tabla para mostrar los usuarios
					$datos.= '<table align="center" cellspacing="3" cellpadding="3" width="75%">
								<tr><td align="left"><b>Area</b></td>
								<td align="left"><b>Programada</b></td>
								<td align="left"><b>Estado</b></td>
								<td><b>Editar</b></td><td><b>Eliminar</b></td>
								</tr>';

$datos .= '<main class="table">
	<section class="table_header">
		<h1> Solicitudes Registradas</h1>
	</section>
	<section class="table_body">
		<table>
			<thead>
				<tr>
					<th>Área</th>
					<th>Programada</th>
					<th>Estado</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
		</table>
	</section>
</main>';

					// recuperar y mostrar todos los registros
								while($fila=mysqli_fetch_array($solicitudes, MYSQLI_ASSOC)){
									$datos.='<tr><td align="left">'.$fila['habitacion'].'</td>
									<td align="left">'.$fila['programada'].'</td>'.
									'<td align="left">'.$fila['estado'].'</td>'.
									'<td align="center"><a href="actualiza.php?id_solicitud='.$fila['id'].'">'.
									'<i class="fa-solid fa-pen-to-square"></i></a></td>
									<td align="center"><a href="elimina.php?id_solicitud='.$fila['id'].'">
									<i class="fa-solid fa-trash-can"></i></a></td></tr>';
								}
					$datos.="</table>";	*/
					$datos = '<main class="table">
									<section class="table_header">
										<h1> Solicitudes Registradas</h1>
									</section>
									<section class="table_body">
										<table>
											<thead>
												<tr>
													<th>Área</th>
													<th>Programada</th>
													<th>Estado</th>
													<th>Editar</th>
													<th>Eliminar</th>
												</tr>
											</thead>
											<tbody>';

while ($fila = mysqli_fetch_array($solicitudes, MYSQLI_ASSOC)) {
	$datos .= '<tr>
		<td align="left">'.$fila['habitacion'].'</td>
									<td align="center">'.$fila['programada'].'</td>';
									switch($fila['estado']){
									    case 'terminada':
									        $datos.='<td align="left"><p class="status_terminada">'.$fila['estado'].'</p></td>';
									        break;
									    case 'en proceso':
									        $datos.='<td align="left"><p class="status_proceso">'.$fila['estado'].'</p></td>';
									        break;
									    default: $datos.='<td align="left"><p class="status_programada">'.$fila['estado'].'</p></td>';
									    break;
									}
									
									$datos.='<td align="center"><a href="actualiza.php?id_solicitud='.$fila['id'].'">'.
									'<i class="fa-solid fa-pen-to-square"></i></a></td>
									<td align="center"><a href="elimina.php?id_solicitud='.$fila['id'].'">
									<i class="fa-solid fa-trash-can"></i></a></td>
	</tr>';
}

$datos .= '</tbody>
		</table>
	</section>
</main>';
				}else{
					$datos.='<p class="error">No existen solicitudes en este momento</p>';
				}
				echo $datos;

			
			}

			
			

?>