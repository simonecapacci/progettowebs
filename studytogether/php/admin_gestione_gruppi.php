<?php
require_once __DIR__ . '/bootstrap.php';

$groups = [];
if (isset($dbh) && method_exists($dbh, 'getGroups')) {
    $groups = $dbh->getGroups();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione gruppi - StudyGroups</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="admin-page">
    <header class="top-bar">
        <h1>STUDY GROUPS</h1>
    </header>

    <main class="admin-container">
        <section class="admin-card" aria-label="Gestione gruppi">
            <div class="admin-card-head">
                <p>Area admin</p>
                <h2>Gestione gruppi</h2>
                <span>Lista dei gruppi presenti nel database con accesso rapido alla pagina informazioni.</span>
            </div>

            <div class="admin-list">
                <?php if (!empty($groups)): ?>
                    <?php foreach ($groups as $group): ?>
                        <article class="admin-row">
                            <h3><?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                            <a class="admin-action" href="info_gruppo.php?id=<?php echo urlencode($group['id']); ?>">Modifica</a>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <article class="admin-row">
                        <h3>Nessun gruppo disponibile</h3>
                        <a class="admin-action" href="info_gruppo.php">Modifica</a>
                    </article>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>
</html>
