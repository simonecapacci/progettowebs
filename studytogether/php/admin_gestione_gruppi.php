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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-body-tertiary">
    <header class="top-bar">
        <h1>STUDY GROUPS</h1>
    </header>

    <main class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <div class="card-header bg-info text-dark border-0 py-4">
                        <p class="text-uppercase fw-semibold small mb-2">Area admin</p>
                        <h2 class="h3 mb-2">Gestione gruppi</h2>
                    </div>

                    <div class="card-body p-4 p-lg-5">
                        <div class="list-group list-group-flush gap-3">
                            <?php if (!empty($groups)): ?>
                                <?php foreach ($groups as $group): ?>
                                    <div class="list-group-item border rounded-3 shadow-sm">
                                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                            <div>
                                                <h3 class="h5 mb-1"><?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                                <p class="mb-0 text-body-secondary">Materia: <?php echo htmlspecialchars($group['subject_name'], ENT_QUOTES, 'UTF-8'); ?></p>
                                            </div>
                                            <button type="button" class="btn btn-danger px-4">Modifica</button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="list-group-item border rounded-3 shadow-sm">
                                    <h3 class="h5 mb-1">Nessun gruppo disponibile</h3>
                                    <p class="mb-0 text-body-secondary">Al momento non ci sono gruppi nel database.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
