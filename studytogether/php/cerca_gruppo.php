<?php
require_once __DIR__ . '/bootstrap.php';

$subjects = [];
if (isset($dbh) && method_exists($dbh, 'getSubjects')) {
    $subjects = $dbh->getSubjects();
}

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
    <title>Cerca gruppo - StudyGroups</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/components.css">
</head>
<body class="search-page">
    <header class="top-bar">
        <h1>STUDY GROUPS</h1>
    </header>

    <main class="search-layout">
        <section class="search-panel">
            <details class="subject-filter" open>
                <summary>Filtra per materia</summary>
                <div class="subject-list">
                    <?php if (!empty($subjects)): ?>
                        <?php foreach ($subjects as $subject): ?>
                            <label>
                                <input type="checkbox" name="subject[]" value="<?php echo htmlspecialchars($subject['name'], ENT_QUOTES, 'UTF-8'); ?>">
                                <?php echo htmlspecialchars($subject['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </label>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <label><input type="checkbox" name="subject[]" value="Analisi"> Analisi</label>
                        <label><input type="checkbox" name="subject[]" value="Programmazione"> Programmazione</label>
                        <label><input type="checkbox" name="subject[]" value="Basi di Dati"> Basi di Dati</label>
                    <?php endif; ?>
                </div>
            </details>

            <section class="results-list" aria-label="Risultati della ricerca">
                <?php if (!empty($groups)): ?>
                    <?php foreach ($groups as $group): ?>
                        <a class="result-card" href="info_gruppo.php?id=<?php echo urlencode($group['id']); ?>" aria-label="Apri il gruppo <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>">
                            <h2><?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                            <p>Materia: <?php echo htmlspecialchars($group['subject_name'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p><?php echo htmlspecialchars($group['date'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($group['time'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="result-card">
                        <h2>Nessun gruppo trovato</h2>
                        <p>Al momento non ci sono gruppi nel database.</p>
                    </div>
                <?php endif; ?>
            </section>
        </section>
    </main>
</body>
</html>
