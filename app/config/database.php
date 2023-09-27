<?php
function connectDB () : mysqli {
	$dbHost = '172.18.0.3'; // Puedes usar 'localhost' o la dirección IP del contenedor MySQL.
	$dbPort = '3306'; // El puerto predeterminado de MySQL.
	$dbUsername = 'root';
	$dbPassword = 'este5ban9';
	$dbName = 'yaexpress_crud';

	// Conexión a la base de datos usando mysqli
	$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $dbPort);

    /* $db = new mysqli('0.0.0.0', 'root', 'este5ban9', 'yaexpress_crud', '3308'); */

  	// Verificar si hay errores en la conexión
	if ($db->connect_error) {
		die("Error de conexión: " . $db->connect_error);
	}
    return $db;

}

