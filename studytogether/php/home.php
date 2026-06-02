<?php
require_once __DIR__ . '/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/components.css">
</head>
<body>
    <header class="top-bar">
        <h1>STUDY GROUPS</h1>
    </header>

    <main class="home-container">
        <section class="home-menu">
            <a href="cerca_gruppo.php" class="home-button">CERCA GRUPPO</a>
            <a href="crea_gruppo.php" class="home-button">CREA GRUPPO</a>
            <a href="my_groups.php" class="home-button">I MIEI GRUPPI</a>
        </section>
    </main>
</body>
</html>
