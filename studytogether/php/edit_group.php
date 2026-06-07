<?php
require_once __DIR__ . '/bootstrap.php';

if (!isset($_GET['id'])) {
    header('Location: admin_home.php');
    exit;
}

$groupId = (int) $_GET['id'];

if ($groupId <= 0) {
    header('Location: admin_home.php');
    exit;
}

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_group_id'])) {
    $name = trim($_POST['group_name'] ?? '');
    $description = trim($_POST['group_description'] ?? '');

    if ($name !== '') {
        $dbh->updateGroup($groupId, $name, $description);
    }

    header('Location: edit_group.php?id=' . $groupId);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_group_id'])) {
    $dbh->deleteGroup($groupId);

    header('Location: admin_home.php');
    exit;
}

$group = $dbh->getGroupById($groupId);
$subscribers = $dbh->getSubscribersByGroupId($groupId);

if (!$group) {
    header('Location: admin_home.php');
    exit;
}

$navbarType = 'admin';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica gruppo - StudyTogether</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php require_once 'navbar.php'; ?>

    <main class="container py-4 py-md-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                <div class="mb-4">
                    <a href="admin_home.php" class="btn btn-outline-secondary btn-sm">
                        Torna all'area admin
                    </a>
                </div>

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header text-white fw-bold py-3" style="background: linear-gradient(135deg, #2563eb 0%, #60a5fa 100%);">
                        Modifica gruppo
                    </div>

                    <div class="card-body p-4">
                        <form method="POST">
                            <input type="hidden" name="edit_group_id" value="<?= h((string) $group['id']) ?>">

                            <div class="mb-3">
                                <label for="group_name" class="form-label">Nome gruppo</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="group_name"
                                    name="group_name"
                                    value="<?= h($group['name']) ?>"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="group_description" class="form-label">Descrizione</label>
                                <textarea
                                    class="form-control"
                                    id="group_description"
                                    name="group_description"
                                    rows="4"
                                ><?= h($group['description'] ?? '') ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Salva modifiche
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-light fw-bold py-3">
                        Iscritti al gruppo
                    </div>

                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <?php if (empty($subscribers)): ?>
                                <div class="list-group-item text-secondary py-3">
                                    Nessun iscritto a questo gruppo.
                                </div>
                            <?php else: ?>
                                <?php foreach ($subscribers as $subscriber): ?>
                                    <div class="list-group-item py-3">
                                        <div class="fw-semibold">
                                            <?= h($subscriber['username']) ?>
                                        </div>

                                        <div class="text-secondary small">
                                            <?= h($subscriber['email'] ?? 'Email non disponibile') ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-danger text-white fw-bold py-3">
                        Elimina gruppo
                    </div>

                    <div class="card-body p-4">
                        <p class="text-secondary">
                            Eliminando il gruppo verranno rimossi anche i collegamenti degli utenti iscritti.
                        </p>

                        <form method="POST" class="delete-group-form">
                            <input type="hidden" name="delete_group_id" value="<?= h((string) $group['id']) ?>">

                            <button type="submit" class="btn btn-danger">
                                Elimina
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <?php require_once 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/delete_group.js"></script>
</body>
</html>