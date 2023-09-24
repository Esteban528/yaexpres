<?php require 'app/app.php';

//crear un email y password
$name = "userAdmin";
$email = "admin@gmail.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$query = "INSERT INTO admins (name, email, password) VALUES ('{$name}' '{$email}', '{$passwordHash}' )";

// $result = $db->query($query);

echo $query;

phpinfo();