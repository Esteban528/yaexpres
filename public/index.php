
<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controller\PageController;
use Controller\TestController;
use Controller\UserController;
use Controller\AdminController;

$router = new Router();

$router->addGet("/", [PageController::class, 'index']);
$router->addGet("/file", [PageController::class, 'files']);
$router->addGet("/image", [PageController::class, 'image']);
$router->addGet("/error", [PageController::class, 'error']);
$router->addGet("/login", [UserController::class, 'login']);
$router->addPost("/login", [UserController::class, 'login']);
$router->addGet("/logout", [UserController::class, 'logout']);
$router->addGet("/register", [UserController::class, 'register']);
$router->addPost("/register", [UserController::class, 'register']);
$router->addGet("/admin", [AdminController::class, 'index']);
$router->addGet("/admin/users", [AdminController::class, 'users']);
$router->addGet("/admin/users/delete", [AdminController::class, 'delete']);
$router->addPost("/admin/users", [AdminController::class, 'users']);
// $router->addPost("/admin", [AdminController::class, 'index']);

 $router->addGet("/test", [TestController::class, 'list']);

$router->checkRoutes();
