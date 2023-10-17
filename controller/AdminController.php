<?php
namespace Controller;

use Model\Permisos;
use Model\User;
use MVC\Router;

class AdminController {

    public static function index(Router $router) : void {
        User::checkAdmin();

        $router->render('admin/index', [
            'actual' => 'admin',
            'actualAdmin' => '',
        ]);
    }
    
    public static function users(Router $router) : void {
        User::checkAdmin();
        
        $users = User::all();
        $ranks = Permisos::all();

        $router->render('admin/users', [
            'actual' => 'admin',
            'users' => $users,
            'ranks' => $ranks,
            'actualAdmin' => 'users',
        ]);
    }

    public static function delete(Router $router) : void {
        User::checkAdmin();
        
        $id = $_GET['id'] ?? null;

        if (!is_null($id)) {
            $user = User::find($id);
            if ($user) {
                $result = $user->delete();
                if ($result) {
                    $msg = "Se eliminó la cuenta (#{$user->id} {$user->nombre} {$user->apellido} | {$user->email} )";
                    header('location: /admin/users');
                }
            }
        }
    }

    public static function edit(Router $router) : void {
        User::checkAdmin();
       
        $id = $_GET['id'] ?? null;

        if (!is_null($id)) {
            $user = User::find(intval($id) ?? 0);
            if(!$user) {
                header('location: /admin/users');
            }
        }else {
            header('location: /admin/users');
        }

        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $userData = $_POST['user'];
            $userData['id'] = intval($id);
            $user = new User($userData);
            $result = $user->update();
            
            if($result){
                header('location: /admin/users');
            }
            else
                header('location: /admin/users?msg=3');
        }

        $router->render('admin/userEdit', [
            'actual' => 'admin',
            'actualAdmin' => 'users',
            'user' => $user ?? null,
        ]);
    }
}