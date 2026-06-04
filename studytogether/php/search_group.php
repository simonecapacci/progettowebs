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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cerca gruppo - StudyGroups</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="search-page bg-body-tertiary d-flex flex-column min-vh-100">
    <?php require_once 'navbar.php'; ?>

    <main class="container-fluid py-3 py-lg-4 flex-grow-1">
        <div class="row g-3 g-lg-4">
            <div class="col-12 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <p class="text-uppercase text-primary fw-semibold small mb-1">Filtri</p>
                                <h2 class="h5 mb-0">Filtra per materia</h2>
                            </div>
                        </div>

                        <div class="accordion accordion-flush" id="subjectAccordion">
                            <div class="accordion-item border rounded-3 overflow-hidden">
                                <h2 class="accordion-header" id="subjectHeading">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#subjectCollapse" aria-expanded="true" aria-controls="subjectCollapse">
                                        Materie disponibili
                                    </button>
                                </h2>
                                <div id="subjectCollapse" class="accordion-collapse collapse show" aria-labelledby="subjectHeading" data-bs-parent="#subjectAccordion">
                                    <div class="accordion-body p-3">
                                        <div class="vstack gap-2">
                                            <?php if (!empty($subjects)): ?>
                                                <?php foreach ($subjects as $subject): ?>
                                                    <label class="form-check d-flex align-items-center gap-2 mb-0">
                                                        <input class="form-check-input m-0" type="checkbox" name="subject[]" value="<?php echo htmlspecialchars($subject['name'], ENT_QUOTES, 'UTF-8'); ?>">
                                                        <span class="form-check-label"><?php echo htmlspecialchars($subject['name'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                    </label>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <label class="form-check d-flex align-items-center gap-2 mb-0"><input class="form-check-input m-0" type="checkbox" value="Analisi"><span class="form-check-label">Analisi</span></label>
                                                <label class="form-check d-flex align-items-center gap-2 mb-0"><input class="form-check-input m-0" type="checkbox" value="Programmazione"><span class="form-check-label">Programmazione</span></label>
                                                <label class="form-check d-flex align-items-center gap-2 mb-0"><input class="form-check-input m-0" type="checkbox" value="Basi di Dati"><span class="form-check-label">Basi di Dati</span></label>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8 col-xl-9">
                <div class="d-flex align-items-end justify-content-between mb-3 mb-lg-4">
                    <div>
                        <p class="text-uppercase text-primary fw-semibold small mb-1">Risultati</p>
                        <h2 class="h4 mb-0">Gruppi disponibili</h2>
                    </div>
                    <span class="text-body-secondary small d-none d-md-inline"><?php echo count($groups); ?> gruppi trovati</span>
                </div>

                <div class="row g-3">
                    <?php if (!empty($groups)): ?>
                        <?php foreach ($groups as $group): ?>
                            <div class="col-12">
                                <a class="card shadow-sm border-0 text-decoration-none text-reset group-result-card h-100" href="info_gruppo.php?id=<?php echo urlencode($group['id']); ?>" aria-label="Apri il gruppo <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                        <div>
                                            <h3 class="h5 mb-2"><?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                            <p class="mb-1 text-body-secondary">Materia: <?php echo htmlspecialchars($group['subject_name'], ENT_QUOTES, 'UTF-8'); ?></p>
                                            <p class="mb-0 text-body-secondary"><?php echo htmlspecialchars($group['date'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($group['time'], ENT_QUOTES, 'UTF-8'); ?></p>
                                        </div>
                                        <span class="btn btn-primary px-4 align-self-start align-self-md-center">Apri</span>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <h3 class="h5">Nessun gruppo trovato</h3>
                                    <p class="mb-0 text-body-secondary">Al momento non ci sono gruppi nel database.</p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
    <?php require_once 'footer.php'; ?>             
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
