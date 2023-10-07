<?php

namespace MVC;

class Router {
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function addGet($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    public function addPost($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    public function checkRoutes() {
        $currentUrl = $_SERVER['REQUEST_URI'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        }else{ 
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ($fn) {
            call_user_func($fn, $this);
        }else {
            echo "Página no encontrada";
        }
    }
    
    public function render($view, $datos = []) {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start(); 
        include_once __DIR__ . "/views/$view.php";
        $content = ob_get_clean(); // Contenido cargado
        include_once __DIR__ . '/views/layout.php';
    }
}