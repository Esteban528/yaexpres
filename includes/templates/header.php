<?php

use Model\User;

$permits = User::getPermits();



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
        <nav class="navbar nav nav-underline navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"> 
                <img class="brand-logo" src="image?image=logo-min.jpeg" alt="brand-logo">    
                YaExpres</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php $n='home'; 
                            echo $actual==$n? 'active': '' ?>" 
                            aria-current="page" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php $n='login'; 
                            echo $actual==$n? 'active': '' ?>" 
                            href="/login">Iniciar Sesion</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        Tu mejor conexión
                    </span>
                </div>
            </div>
        </nav>
    </header>
