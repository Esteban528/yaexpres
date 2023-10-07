<?php
namespace Controller;

use MVC\Router;

class PageController {
    public static function index(Router $router) : void {
        $router->render('pages/index', [
            'title' => "YaExpres"
        ]);
    }

    public static function css(Router $router) : void {
        include_once __DIR__."/../public/build/css/app.css";
    }
}