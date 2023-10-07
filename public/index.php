<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controller\PageController;

$router = new Router();

$router->addGet("/", [PageController::class, 'index']);

$router->checkRoutes();

importTemplate('header');