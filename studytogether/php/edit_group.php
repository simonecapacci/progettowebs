<?php
require_once __DIR__ . '/api/api-edit_group.php';

$templateParams['pageTitle'] = 'Modifica Gruppo';
$templateParams['content_page'] = './main/edit_group-main.php';

require_once('./template/base.php');
?>
    <script src="../js/confirm_dialog.js"></script>
    <script src="../js/delete_group.js"></script>
</body>
</html>