<?php
namespace Controller;

use MVC\Router;
use Model\User;
use MVC\Misc;

class UserController {
    
    public static function login(Router $router) {
        $msg = null;
        $loginData = [];

        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $loginData = $_POST['login'];
            $temporalUser = new User($loginData);
            $result = $temporalUser->userExist();
            
            if ($result->num_rows == 1) {
                
                $login = $temporalUser->auth($result);
                if (!$login) {
                    $msg = ['Contraseña incorrecta', 'alert-danger'];
                }

            }else $msg = ['El usuario no está registrado (No existe)', 'alert-danger'];
        }

        $router->render('user/login', [
            'login' => $loginData,
            'actual' => "login",
            'msg' => $msg,
        ]);
    }

    public static function logout() {
        User::logout();
    }
    
    public static function register(Router $router) {
        $userInfo = [];
        $msg = null;
        $errors = [];

        if ($_SERVER['REQUEST_METHOD']==="POST"){           
            $userInfo = ($_POST["user"]);

            if(!empty($userInfo)){
                $user = new User($userInfo);
                $result = $user->create();
                $errors = $user->validate();
                
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
            'msg' => $msg,
            'messages' => $errors ?? [],
        ]);
    }
}