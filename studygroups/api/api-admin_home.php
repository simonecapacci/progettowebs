<?php
require_once __DIR__ . '/../bootstrap.php';

$groups = $dbh->getGroups();
$users = $dbh->getUsers();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user_id'])) {

    $userIdToDelete = (int) $_POST['delete_user_id'];

    $dbh->deleteUser($userIdToDelete);

    header('Location: ../admin_home.php');
    exit;
}