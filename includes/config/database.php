<?php
function connectDB () : mysqli {
	$dbHost = 'db'; 
	$dbPort = '3306'; // El puerto predeterminado de MySQL.
	$dbUsername = 'root';
	$dbPassword = 'este5ban9';
	$dbName = 'yaexpress_crud';

	// Conexión a la base de datos usando mysqli
	$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $dbPort);

  	// Verificar si hay errores en la conexión
	if ($db->connect_error) {
		die("Error de conexión: " . $db->connect_error);
	}
    return $db;

}

