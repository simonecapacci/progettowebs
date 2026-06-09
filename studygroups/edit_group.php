<?php
require_once __DIR__ . '/api/api-edit_group.php';

$templateParams['pageTitle'] = 'Modifica Gruppo';
$templateParams['content_page'] = './main/edit_group-main.php';
$templateParams['scripts'] = ['./js/confirm_dialog.js', './js/delete_group.js'];

require_once('./template/base.php');
?>