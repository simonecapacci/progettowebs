<?php
require_once __DIR__ . '/bootstrap.php';

$groups = $dbh->getGroups();
$users = $dbh->getUsers();

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home - StudyTogether</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php require_once 'navbar.php'; ?>

    <main class="container py-4 py-md-5">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-3 p-md-4">
                        <div class="mb-4">
                            <p class="text-uppercase text-primary fw-semibold small mb-1">Area amministratore</p>
                            <h1 class="h3 mb-2">Gestione utenti e gruppi</h1>
                            <p class="text-secondary mb-0">Seleziona una scheda per vedere solo la lista desiderata.</p>
                        </div>

                        <ul class="nav nav-tabs mb-4" id="adminTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="groups-tab" data-bs-toggle="tab" data-bs-target="#groups-pane" type="button" role="tab" aria-controls="groups-pane" aria-selected="true">
                                    Gruppi
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="users-tab" data-bs-toggle="tab" data-bs-target="#users-pane" type="button" role="tab" aria-controls="users-pane" aria-selected="false">
                                    Utenti
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="adminTabsContent">
                            <div class="tab-pane fade show active" id="groups-pane" role="tabpanel" aria-labelledby="groups-tab" tabindex="0">
                                <div class="list-group list-group-flush">
                                    <?php if (!empty($groups)): ?>
                                        <?php foreach ($groups as $group): ?>
                                            <div class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 py-3">
                                                <div>
                                                    <div class="fw-semibold fs-5"><?= h($group['name']) ?></div>
                                                    <div class="text-secondary small">
                                                        <?= h($group['subject_name'] ?? 'Materia non disponibile') ?>
                                                        <?php if (!empty($group['date']) || !empty($group['time'])): ?>
                                                            · <?= h(($group['date'] ?? '') . (!empty($group['time']) ? ' ' . $group['time'] : '')) ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm px-3">Modifica</button>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="list-group-item text-center text-secondary py-4">Nessun gruppo disponibile.</div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="users-pane" role="tabpanel" aria-labelledby="users-tab" tabindex="0">
                                <div class="list-group list-group-flush">
                                    <?php if (!empty($users)): ?>
                                        <?php foreach ($users as $user): ?>
                                            <div class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 py-3">
                                                <div>
                                                    <div class="fw-semibold fs-5">
                                                        <?= h(trim(($user['name'] ?? '') . ' ' . ($user['surname'] ?? '')) ?: $user['username']) ?>
                                                    </div>
                                                    <div class="text-secondary small">
                                                        @<?= h($user['username']) ?> · <?= h($user['role'] ?? 'utente') ?>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm px-3">Modifica</button>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="list-group-item text-center text-secondary py-4">Nessun utente disponibile.</div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
