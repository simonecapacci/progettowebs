<?php
require_once __DIR__ . '/../bootstrap.php';
$subjects = [];
if (isset($dbh) && method_exists($dbh, 'getSubjects')) {
    $subjects = $dbh->getSubjects();
}

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $dbh->createGroup(
        $_POST["group_name"],
        $_POST["description"],
        $_POST["subject_id"],
        $_POST["event_date"],
        $_POST["event_time"],
        $_SESSION["user_id"]
    );

    header("Location: my_groups.php");
    exit();
}


?>