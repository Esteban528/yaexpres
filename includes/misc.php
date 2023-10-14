<?php 
require 'globals.php';

function importTemplate($template, $actualPage = '') {
    $actual = $actualPage;
    
    include TEMPLATES_DIR."/{$template}".'.php';
}

function importHtml($template, $actual = '') {
   include TEMPLATES_DIR."/{$template}".'.php';
}
?>
