<?php
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'httponly' => true,
    'samesite' => 'Lax',
]);

session_start();

$currentPage = basename($_SERVER['SCRIPT_NAME'] ?? '');
$publicPages = ['index.php', 'login.php', 'signup.php'];

if (!isset($_SESSION['user_id']) && !in_array($currentPage, $publicPages, true)) {
    header('Location: index.php');
    exit;
}

require_once __DIR__ . "/db/database.php";

$dbh = new DatabaseHelper("localhost", "root", "", "studytogether", 1104);
?>
