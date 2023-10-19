<?php

use Model\User;
    //showFormat($actualAdmin, true);
    $permit = User::getPermits()??0;    

    $nav = [
        [
            'title' => '<i class="bi bi-people"></i> Usuarios', 
            'actual_key' => 'users',
            'minPermit' => 5,
            'onlyPermit' => false,
            'href' => '/admin/users',
        ],
        [
            'title' => '<i class="bi bi-file-post"></i> Publicaciones', 
            'actual_key' => 'posts',
            'minPermit' => 3,
            'onlyPermit' => false,
            'href' => '/admin/post',
        ],
    ];
?>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="sidebar-sticky p-3">
                <ul class="nav list-group flex-column">
                    <li class="nav-item">
                        <p href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <i class="bi bi-sliders"></i> Panel admin
                        </p>
                    </li>
                    <?php 
                        foreach($nav as $element):?>
                        <li class="nav-item">
                        <a href="<?php echo $element['href'];?>" class="list-group-item list-group-item-action <?php echo $element['actual_key'] == $actualAdmin ?'active':'';?>" aria-current="true">
                        <?php echo $element['title'] ?>
                        </a>
                    </li>
                    <?php endforeach;
                    ?>
                </ul>
            </div>
        </nav>

        