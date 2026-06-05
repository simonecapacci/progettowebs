<?php
require_once __DIR__ . '/bootstrap.php';

$subjects = [];
if (isset($dbh) && method_exists($dbh, 'getSubjects')) {
    $subjects = $dbh->getSubjects();
}

$groups = [];
$userId = $_SESSION['user_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['unsubscribe_group_id']) && $userId) {
    $groupId = (int) $_POST['unsubscribe_group_id'];

    $dbh->unsubscribeFromGroup($userId, $groupId);

    header('Location: search_group.php');
    exit;
}

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
                                        <div class="vstack gap-2" id="subjectFilters">
                                            <?php if (!empty($subjects)): ?>
                                                <?php foreach ($subjects as $subject): ?>
                                                    <label class="form-check d-flex align-items-center gap-2 mb-0">
                                                        <input class="form-check-input m-0 js-subject-filter" type="checkbox" value="<?= htmlspecialchars($subject['name'], ENT_QUOTES, 'UTF-8') ?>">
                                                        <span class="form-check-label"><?= htmlspecialchars($subject['name'], ENT_QUOTES, 'UTF-8') ?></span>
                                                    </label>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <label class="form-check d-flex align-items-center gap-2 mb-0"><input class="form-check-input m-0 js-subject-filter" type="checkbox" value="Analisi"><span class="form-check-label">Analisi</span></label>
                                                <label class="form-check d-flex align-items-center gap-2 mb-0"><input class="form-check-input m-0 js-subject-filter" type="checkbox" value="Programmazione"><span class="form-check-label">Programmazione</span></label>
                                                <label class="form-check d-flex align-items-center gap-2 mb-0"><input class="form-check-input m-0 js-subject-filter" type="checkbox" value="Basi di Dati"><span class="form-check-label">Basi di Dati</span></label>
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
                    <span class="text-body-secondary small d-none d-md-inline" id="groupsCount"><?php echo count($groups); ?> gruppi trovati</span>
                </div>

                <div class="row g-3" id="groupsList">
                    <?php if (!empty($groups)): ?>
                        <?php foreach ($groups as $group): ?>
                            <?php $subjectName = strtolower((string) ($group['subject_name'] ?? '')); ?>
                            <div class="col-12 group-item" data-subject="<?= htmlspecialchars($subjectName, ENT_QUOTES, 'UTF-8') ?>">
                                <div class="card shadow-sm border-0 group-result-card h-100">
                                    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                        <div>
                                            <h3 class="h5 mb-2">
                                                <?= htmlspecialchars($group['name']) ?>
                                            </h3>

                                            <p class="mb-1 text-body-secondary">
                                                Materia: <?= htmlspecialchars($group['subject_name']) ?>
                                            </p>

                                            <p class="mb-0 text-body-secondary">
                                                <?= htmlspecialchars($group['date']) ?>
                                                -
                                                <?= htmlspecialchars($group['time']) ?>
                                            </p>
                                        </div>
                                        <?php
                                        $isSubscribed = false;
                                        $isCreator = false;
                                        
                                        if($userId){
                                            $isSubscribed = $dbh->isSubscribed($userId, $group['id']);
                                            $isCreator = ($group['creator_id'] == $userId);
                                        }
                                        ?>

                                        <?php if($isCreator): ?>
                                            <button type="button" class="btn btn-secondary group-action-btn" disabled>
                                                Il Tuo Gruppo
                                            </button>

                                        <?php elseif($isSubscribed): ?>

                                            <form method="POST">
                                                <input type="hidden" name="unsubscribe_group_id" value="<?= htmlspecialchars($group['id'], ENT_QUOTES, 'UTF-8') ?>">

                                                <button type="submit" class="btn btn-danger group-action-btn">
                                                    Disiscriviti
                                                </button>
                                            </form>
                                        <?php else: ?>

                                            <form action="subscribe_group.php" method="POST" onclick="event.stopPropagation();">
                                                <input type="hidden" name="group_id" value="<?= $group['id'] ?>">

                                                <button type="submit" class="btn btn-primary group-action-btn">
                                                    Iscriviti 
                                                </button>
                                            </form>
                                        <?php endif; ?>

                                    </div>
                                </div>
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
    <script src="../js/script.js"></script>
</body>
</html>
