<?php
namespace Controller;

use MVC\Router;

class PageController {
    public static function index(Router $router) : void {
        $router->render('pages/index', [
            'title' => "YaExpres"
        ]);
    }

    public static function css(Router $router) {
        //  fopen(__DIR__.'/../public/build/css/app.css');
        // readfile(__DIR__.'/../public/build/css/app.css');
        header('Content-Type: text/css');

        $contenido = file_get_contents(__DIR__.'/../public/build/css/app.css');
        echo $contenido;
    }

    public static function error(Router $router) {
        $router->render('pages/error', [
            'error' => "404",
            'info' => "Página no encontrada"
        ]);
    }

    public static function image(Router $router) {
        ob_clean();

        $image = $_GET['image'] ?? null;

        if (!is_null($image)) {
            $route = __DIR__.'/../public/images/'.$image;
    
            if (file_exists($route)) {
                $fileExtension = pathinfo($route, PATHINFO_EXTENSION);
                
                if ($fileExtension === 'jpg' || $fileExtension === 'jpeg') {
                    header('Content-Type: image/jpeg');
                } elseif ($fileExtension === 'png') {
                    header('Content-Type: image/png');
                } elseif ($fileExtension === 'gif') {
                    header('Content-Type: image/gif');
                } else {
                    header('Content-Type: application/octet-stream');
                }
    
                readfile($route);
            } else {
                echo 'Imagen no encontrada';
            }
        } else {
            echo 'Nombre de imagen no proporcionado';
        }
    }
}