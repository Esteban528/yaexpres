<?php require 'app/app.php';

//crear un email y password
$name = "admin";
$apellido = "pinarsoft";
$telefono = 1;
$permiso = 2;
$email = "pinarsoftenterprise@gmail.com";
$password = "pinarsoftAdminYaExpres";
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

/* $query = "INSERT INTO admins (name, email, password) VALUES ('{$name}' '{$email}', '{$passwordHash}' )"; */

$query = "insert into usuarios (nombre, apellido, email, telefono, password, permiso) VALUES ('{$name}', '{$apellido}, '{$email}', '{$telefono}','{$passwordHash}', {$permiso} ))";

$result = $db->query($query);
echo $result;

/* echo $query; */

