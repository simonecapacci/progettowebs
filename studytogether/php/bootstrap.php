<?php
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'httponly' => true,
    'samesite' => 'Lax',
]);

session_start();

require_once __DIR__ . "/db/database.php";

$dbh = new DatabaseHelper("localhost", "root", "", "studytogether", 1104);
?>
