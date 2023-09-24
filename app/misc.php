<?php 
require 'globals.php';

function importTemplate($template) {
    include TEMPLATES_DIR."/{$template}".'.php';
}