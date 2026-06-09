<?php
require_once __DIR__ . '/../bootstrap.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$navbarType = 'user';
$username = $_SESSION['username'];
$userId = $_SESSION['user_id'];
$createdGroups = $dbh->getGroupsByUsername($username);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['unsubscribe_group_id'])) {
    $groupId = (int) $_POST['unsubscribe_group_id'];
    $dbh->unsubscribeFromGroup($userId, $groupId);
    header('Location: my_groups.php');
    exit;
}

$joinedGroups = $dbh->getSubscribedGroups($userId);
?>