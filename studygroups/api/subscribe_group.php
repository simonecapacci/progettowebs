<?php
require_once __DIR__ . '/../bootstrap.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

if(isset($_POST['group_id'])){

    $groupId = (int)$_POST['group_id'];
    $userId = $_SESSION['user_id'];

    $dbh->subscribeToGroup($userId, $groupId);
}

header("Location: ../search_group.php");
exit;