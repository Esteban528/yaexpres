<?php

use Model\User;

$permit = User::getPermits()??0;    

$header = [
    [
        'title' => 'Inicio', 
        'actual_key' => 'home',
        'minPermit' => 0,
        'onlyPermit' => false,
        'href' => '/',
    ],
    [
        'title' => 'Iniciar sesión', 
        'actual_key' => 'login',
        'minPermit' => 0,
        'onlyPermit' => true,
        'href' => '/login',
    ],
    [
        'title' => 'Admin panel', 
        'actual_key' => 'admin',
        'minPermit' => User::$adminLevel,
        'onlyPermit' => false,
        'href' => '/admin',
    ],

    [
        'title' => 'Cerrar sesión', 
        'actual_key' => 'logout',
        'minPermit' => 1,
        'onlyPermit' => false,
        'href' => '/logout',
    ],
];

header('Content-Type: text/html'); 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YaExpres - Inicio</title>
    <link rel="stylesheet" type="text/css" href="/file?type=css&file=bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/file?type=css&file=app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <nav class="navbar nav bg-primary navbar-expand-lg mb-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"> 
                <img class="brand-logo" src="/image?image=logo-min.jpeg" alt="brand-logo">    
                Conexion YaExpress</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php 
                            foreach ($header as $navItems){
                                $bool = false;
                                if ($navItems['onlyPermit']==true && $navItems['minPermit'] == $permit){
                                    $bool = true;
                                }else{
                                    if ($permit >= $navItems['minPermit'] && !$navItems['onlyPermit']) {
                                        $bool = true;
                                    }
                                }

                                if ($bool):
                                    ?>
                                        <li class="nav-item">
                                        <a class="nav-link <?php 
                                        echo $actual==$navItems['actual_key'] ? 'active': '' ?>" 
                                        href="<?php echo $navItems['href'] ?>">
                                            <?php echo $navItems['title'] ?>
                                        </a>
                                        </li>
                                    <?php
                                endif;
                            }                            
                        ?>
                    </ul>
                    <span class="navbar-text">
                        Tu mejor conexión
                    </span>
                </div>
            </div>
        </nav>
    </header>
