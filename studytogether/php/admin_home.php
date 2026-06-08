<?php
require_once __DIR__ . '/api/api-admin_home.php';

$templateParams['pageTitle'] = 'Admin Home';
$templateParams['content_page'] = './main/admin_home-main.php';

require_once('./template/base.php');
?>
    <script src="../js/confirm_dialog.js"></script>
    <script src="../js/delete_users.js"></script>
