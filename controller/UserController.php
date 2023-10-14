<?php
namespace Controller;

use MVC\Router;
use Model\User;
use MVC\Misc;

class UserController {
    
    public static function login(Router $router) {

        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $loginData = $_POST['login'];
        }

        $router->render('user/login', [
            'email' => $_POST['login']['email'] ?? '',
            'password' => $_POST['login']['password'] ?? '',
            'actual' => "login",
        ]);
    }
    
    public static function register(Router $router) {
        $userInfo = [];
        $msg = null;
        if ($_SERVER['REQUEST_METHOD']==="POST"){           
            $userInfo = ($_POST["user"]);

            if(!empty($userInfo)){
                $user = new User($userInfo);
                $result = $user->create();
                
                if ($result)
                    header('location: /?msg=0');
                else {
                    $msg = ["Ha ocurrido un error, ese email ya existe"];
                }
            }
        }

        $router->render('user/register', [
            'content' => "",
            'user' => $userInfo,
            'actual' => "login",
            'msg' => $msg
        ]);
    }
}