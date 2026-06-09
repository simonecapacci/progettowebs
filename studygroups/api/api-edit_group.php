<?php
require_once __DIR__ . '/../bootstrap.php';

if (!isset($_GET['id'])) {
    header('Location: admin_home.php');
    exit;
}

$groupId = (int) $_GET['id'];

if ($groupId <= 0) {
    header('Location: admin_home.php');
    exit;
}

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_group_id'])) {
    $name = trim($_POST['group_name'] ?? '');
    $description = trim($_POST['group_description'] ?? '');

    if ($name !== '') {
        $dbh->updateGroup($groupId, $name, $description);
    }

    header('Location: edit_group.php?id=' . $groupId);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_group_id'])) {
    $dbh->deleteGroup($groupId);

    header('Location: admin_home.php');
    exit;
}

$group = $dbh->getGroupById($groupId);
$subscribers = $dbh->getSubscribersByGroupId($groupId);

if (!$group) {
    header('Location: admin_home.php');
    exit;
}

$navbarType = 'admin';
?>