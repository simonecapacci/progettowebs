<?php
require_once __DIR__ . '/bootstrap.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$navbarType = 'user';

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$username = $_SESSION['username'];
$userId = $_SESSION['user_id'];
$createdGroups = $dbh->getGroupsByUsername($username);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['unsubscribe_group_id'])) {
    $groupId = (int) $_POST['unsubscribe_group_id'];
    $dbh->unsubscribeFromGroup($userId, $groupId);
    header('Location: my_groups.php');
    exit;
}

$joinedGroups = $dbh->getSubscribedGroups($userId);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I miei gruppi - StudyGroups</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <?php require_once 'navbar.php'; ?>

    <main class="container py-4 py-md-5 flex-grow-1">
        <section class="card shadow-sm border-0 overflow-hidden mb-4 mb-md-5">
            <div class="card-body p-0">
                <div class="px-3 px-md-4 py-4" style="background: linear-gradient(135deg, #1d4ed8 0%, #60a5fa 100%); color: #fff;">
                    <p class="text-uppercase fw-semibold small mb-1" style="letter-spacing: .12em; color: rgba(255,255,255,.82);">Le tue attività</p>
                    <h1 class="h3 mb-2">I miei gruppi</h1>
                    <p class="mb-0" style="color: rgba(255,255,255,.88);">Visualizza i gruppi a cui sei iscritto e quelli che hai creato da te.</p>
                </div>
            </div>
        </section>

        <div class="row g-4">
            <div class="col-12 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header border-0 text-white fw-bold py-3" style="background: linear-gradient(135deg, #2563eb 0%, #60a5fa 100%);">
                        Gruppi a cui sono iscritto
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <?php if (empty($joinedGroups)): ?>
                                <div class="list-group-item text-center text-body-secondary py-4">Nessun gruppo trovato</div>
                            <?php else: ?>
                                <?php foreach ($joinedGroups as $group): ?>
                                    <div class="list-group-item py-3">
                                        <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
                                            <div>
                                                <div class="fw-semibold fs-5"><?= h($group['name']) ?></div>
                                                <div class="text-body-secondary small">
                                                    <?= h($group['subject_name']) ?> · <?= h($group['date']) ?> alle <?= h(substr($group['time'], 0, 5)) ?>
                                                </div>
                                                <?php if (!empty($group['description'])): ?>
                                                    <div class="small mt-2 text-body-secondary"><?= h($group['description']) ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <form method="POST" class="ms-md-auto unsubscribe-form">
                                                <input type="hidden" name="unsubscribe_group_id" value="<?= h((string) $group['id']) ?>">
                                                <button type="submit" class="btn btn-danger btn-sm px-3">Disiscriviti</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header border-0 text-white fw-bold py-3" style="background: linear-gradient(135deg, #2563eb 0%, #60a5fa 100%);">
                        Gruppi creati da me
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <?php if (empty($createdGroups)): ?>
                                <div class="list-group-item text-center text-body-secondary py-4">Nessun gruppo creato</div>
                            <?php else: ?>
                                <?php foreach ($createdGroups as $group): ?>
                                    <div class="list-group-item py-3">
                                        <div class="fw-semibold fs-5"><?= h($group['name']) ?></div>
                                        <div class="text-body-secondary small">
                                            <?= h($group['subject_name']) ?> · <?= h($group['date']) ?> alle <?= h(substr($group['time'], 0, 5)) ?>
                                        </div>
                                        <?php if (!empty($group['description'])): ?>
                                            <div class="small mt-2 text-body-secondary"><?= h($group['description']) ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/unsubscribed.js"></script>
</body>
</html>
