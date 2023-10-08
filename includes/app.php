<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__.'/misc.php';
require __DIR__.'/config/database.php';


//Global Functions
$db = connectDB();

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
