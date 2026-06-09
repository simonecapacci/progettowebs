<?php
require_once __DIR__ . '/api/api-admin_home.php';

$templateParams['pageTitle'] = 'Admin Home';
$templateParams['content_page'] = './main/admin_home-main.php';
$templateParams['scripts'] = ['./js/confirm_dialog.js', './js/delete_users.js'];

require_once('./template/base.php');
?>
