<?php
require_once __DIR__ . '/bootstrap.php';

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$templateParams['pageTitle'] = 'Home';
$templateParams['content_page'] = './main/home_main.php';

require './template/base.php';
?>
