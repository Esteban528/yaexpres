<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__.'/misc.php';
require __DIR__.'/config/database.php';

use Controller\EmailController;

//Global Functions
$db = connectDB();
// $email = EmailController::configure();

Use Model\Base;
Base::setDB($db);

function showFormat ($value, $bool = false)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';

  if($bool){
    exit;
  }
}
