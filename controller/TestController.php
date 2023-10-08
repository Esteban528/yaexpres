<?php
namespace Controller;

use MVC\Router;
use Model\User;

class TestController {
    public static function list (Router $router) {
        /* protected static $dbCol = [
            "id", "nombre", "apellido", "email", "telefono", "cedula", "password", "permiso" 
          ]; */
    
        $contentUser = User::all();
        // foreach($contentUser as $key => $value) {
        //     if ($value->id != "2") {
        //         $result = $value->delete();
        //         showFormat($result);
        //     }
        // }

        $router->render('test/index', [
            'content' => $contentUser
        ]);
    }
}