<?php
session_start();

require_once __DIR__ . "/db/database.php";

$dbh = new DatabaseHelper("localhost", "root", "", "studytogether", 1104);
?>
