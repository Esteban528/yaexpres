<?php require_once __DIR__.'/../includes/app.php';
importTemplate('header', $actual);

if (!empty($msg)) {
    $msg_content = $msg[0];
    $msg_class = $msg[1] ?? 'alert-danger';
    
    ?>

    <div class="alert <?php echo $msg_class?>" role="alert">
        <?php echo $msg_content?>
    </div>


    <?php
}

echo $content;

importTemplate('footer');