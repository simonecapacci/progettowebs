<?php
require_once __DIR__ . '/api/api-my_groups.php';


$templateParams['pageTitle'] = 'I miei gruppi';
$templateParams['content_page'] = './main/my_groups-main.php';
$templateParams['scripts'] = ['../js/confirm_dialog.js', '../js/unsubscribed.js'];

require_once('./template/base.php');
?>


