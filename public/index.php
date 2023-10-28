
<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controller\PageController;
use Controller\TestController;
use Controller\UserController;
use Controller\AdminController;
use Controller\PremiumController;

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
$router->addGet("/admin/users", [AdminController::class, 'getUsers']);
$router->addGet("/admin/users/delete", [AdminController::class, 'deleteUser']);
$router->addGet("/admin/users/edit", [AdminController::class, 'editUser']);
$router->addPost("/admin/users/edit", [AdminController::class, 'editUser']);
$router->addGet("/admin/post", [AdminController::class, 'getPosts']);
$router->addGet("/admin/post/add", [AdminController::class, 'addPosts']);
$router->addPost("/admin/post/add", [AdminController::class, 'addPosts']);
$router->addGet("/admin/post/edit", [AdminController::class, 'editPosts']);
$router->addPost("/admin/post/edit", [AdminController::class, 'editPosts']);
$router->addGet("/admin/post/hide", [AdminController::class, 'hidePosts']);

$router->addGet("/posts", [PageController::class, 'showPosts']);

$router->addGet("/tradingexpress", [PageController::class, 'showPremiumPost']);
// $router->addGet("/posts", [PageController::class, 'showPostsPremium']);
// $router->addPost("/admin", [AdminController::class, 'index']);

 $router->addGet("/test", [TestController::class, 'list']);

$router->checkRoutes();
