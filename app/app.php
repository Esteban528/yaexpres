<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__.'/misc.php';
require __DIR__.'/config/database.php';

Use App\User;

// Global Functions
$db = connectDB();
User::setDB($db);


function showFormat ($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
}
