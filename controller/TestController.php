<?php
namespace Controller;

use Model\PostMetadata;
use MVC\Router;
use Model\User;

class TestController {
    public static function list (Router $router) {
        /* protected static $dbCol = [
            "id", "nombre", "apellido", "email", "telefono", "cedula", "password", "permiso" 
          ]; */
    
        // $contentUser = new User(['email'=>'estebangonza2005@gmail.com']);
        // $contentUser->userExist();
        // foreach($contentUser as $key => $value) {
        //     if ($value->id != "2") {
        //         $result = $value->delete();
        //         showFormat($result);
        //     }
        // }
        // showFormat(User::isAuth());
        $PostMetadata = new PostMetadata([
            'clave' => 'test',
            'valor' => 'test',
            'tipo' => '?',
            'idPost' => 1,
        ]);

        //$result = $PostMetadata->create();
        
        exit;

        $router->render('test/index', [
            'content' => $contentUser ?? null,
        ]);
    }
}