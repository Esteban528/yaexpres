
<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controller\PageController;
use Controller\TestController;
use Controller\UserController;

$router = new Router();

$router->addGet("/", [PageController::class, 'index']);
$router->addGet("/css.css", [PageController::class, 'css']);
$router->addGet("/image", [PageController::class, 'image']);
$router->addGet("/error", [PageController::class, 'error']);
$router->addGet("/login", [UserController::class, 'login']);
$router->addGet("/register", [UserController::class, 'register']);
// $router->addGet("/test", [TestController::class, 'list']);

$router->checkRoutes();
