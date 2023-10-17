<?php
namespace Controller;

use MVC\Router;

class AdminController {
    public static function index(Router $router) : void {
        
        $router->render('admin/index', [
            'actual' => 'admin',
            'actualAdmin' => 'user',
        ]);
    }
}