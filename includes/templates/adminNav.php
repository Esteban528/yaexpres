<?php

use Model\User;
    $permit = User::getPermits()??0;    

    $nav = [
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
            'title' => 'Cerrar sesión', 
            'actual_key' => 'logout',
            'minPermit' => 1,
            'onlyPermit' => false,
            'href' => '/logout',
        ],
    ];
?>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav list-group flex-column">
                    <li class="nav-item">
                        <p href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <i class="bi bi-sliders"></i> Panel admin
                        </p>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        <i class="bi bi-people"></i> Usuarios
                        </a>
                    </li>

                    <?php 
                        foreach($nav as $element):?>
                        <li class="nav-item">
                        <a href="<?php echo $element['href'];?>" class="list-group-item list-group-item-action <?php echo $element['actual_key'] == $actualAdmin ?'active':'';?>" aria-current="true">
                        <i class="bi bi-people"></i> Usuarios
                        </a>
                    </li>
                    <?php endforeach;
                    ?>
                </ul>
            </div>
        </nav>

        