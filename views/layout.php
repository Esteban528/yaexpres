<?php require_once __DIR__.'/../includes/app.php';
importTemplate('header', 'actual', $actual ?? '');

if (!empty($msg)) {
    $msg_content = $msg[0];
    $msg_class = $msg[1] ?? 'alert-danger';

    ?>
    <div class="container alert-container">
        <div class="alert <?php echo $msg_class?> alert-dismissible fade show" role="alert">
            <?php echo $msg_content?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>


    <?php
}

if(!empty($messages)) {
    foreach($messages as $message) {
        ?> 
            <div class="alert alert-danger" role="alert">
            <?php echo $message ?>
            </div>
        <?php
    }
}  

echo $content;

importTemplate('footer');