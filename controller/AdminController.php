<?php
namespace Controller;

use Model\Permisos;
use Model\User;
use MVC\Router;

class AdminController {

    public static function index(Router $router) : void {
        
        $router->render('admin/index', [
            'actual' => 'admin',
            'actualAdmin' => '',
        ]);
    }
    
    public static function users(Router $router) : void {
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
}