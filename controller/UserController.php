<?php
namespace Controller;

use MVC\Router;
use Model\User;

class UserController {
    
    public static function login(Router $router) {

        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $loginData = $_POST['login'];
            
            
        }

        $router->render('user/login', [
            'email' => $_POST['login']['email'] ?? '',
            'password' => $_POST['login']['password'] ?? '',
        ]);
    }
    
    public static function register(Router $router) {
        $router->render('user/register', [
            'content' => ""
        ]);
    }
}