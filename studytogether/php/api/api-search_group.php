<?php
require_once __DIR__ . '/../bootstrap.php';

$subjects = [];
if (isset($dbh) && method_exists($dbh, 'getSubjects')) {
    $subjects = $dbh->getSubjects();
}

$groups = [];
$userId = $_SESSION['user_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['unsubscribe_group_id']) && $userId) {
    $groupId = (int) $_POST['unsubscribe_group_id'];

    $dbh->unsubscribeFromGroup($userId, $groupId);

    header('Location: search_group.php');
    exit;
}

if (isset($dbh) && method_exists($dbh, 'getGroups')) {
    $groups = $dbh->getGroups();
}

?>