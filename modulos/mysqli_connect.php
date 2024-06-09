<?php # Script 9.2 - mysqli_connect.php

//  
// Este archivo establece la conección a MySQL
// 

// Define contantes para acceso a la Base de Datos:
/*DEFINE ('DB_NAME', 'pweb');
DEFINE ('DB_USER', 'kaciel');
DEFINE ('DB_PASS', '12345');
DEFINE ('DB_HOST', '127.0.0.1:3310');*/

$DB_NAME = 'id20867219_pweb';
$DB_USER = 'id20867219_kaciel';
$DB_PASS = 'abc12345ABC?';
$DB_HOST = 'localhost';

// Realizar la conexión:
$conexion = @mysqli_connect ($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) 
			OR die ('No se puede conectar a MySQL: ' . mysqli_connect_error() );

// Codificación de caracteres...
mysqli_set_charset($conexion, 'utf8');