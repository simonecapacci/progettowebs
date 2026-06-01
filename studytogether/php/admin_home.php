<?php
require_once __DIR__ . '/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_home</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="top-bar">
        <h1>STUDY GROUPS</h1>
    </header>

    <main class="login-container">
        <div class="login-box">
            <button type="button" onclick="window.location.href='gestioneGruppi.php'">GESTIONE GRUPPI</button>
            <button type="button" onclick="window.location.href='gestioneAccount.php'">GESTIONE ACCOUNT</button>
        </div>
    </main>
</body>
</html>