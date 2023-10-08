<?php
namespace Controller;

use MVC\Router;
use Model\User;

class UserController {
    
    public static function login(Router $router) {
        $router->render('user/login', [
            'content' => ""
        ]);
    }
    
    public static function register(Router $router) {
        $router->render('user/register', [
            'content' => ""
        ]);
    }
}