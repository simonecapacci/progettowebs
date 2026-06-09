<?php
require_once __DIR__ . '/api/api-search_group.php';

$templateParams['pageTitle'] = 'Cerca gruppo';
$templateParams['content_page'] = './main/search_group-main.php';
$templateParams['scripts'] = ['../js/script.js', '../js/confirm_dialog.js', '../js/unsubscribed.js'];

require_once ('./template/base.php');

?>
   

