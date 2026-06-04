<?php
require_once __DIR__ . '/bootstrap.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];

$createdGroups = $dbh->getGroupsByUsername($username);

$userId = $_SESSION['user_id'];

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

<main class="container py-5 flex-grow-1">

    <div class="text-center mb-5">
        <h2 class="fw-bold">I miei gruppi</h2>
        <p class="text-muted">Visualizza le sessioni a cui sei iscritto e quelle create da te.</p>
    </div>

    <div class="row justify-content-center g-5">

        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center fw-bold py-3">
                    SESSIONI A CUI SONO ISCRITTO
                </div>

                <div class="card-body">
                    <div class="list-group">
                        <?php if (empty($joinedGroups)): ?>
                            <div class="list-group-item text-center text-muted">
                                Nessuna sessione trovata
                            </div>
                        <?php else: ?>
                            <?php foreach ($joinedGroups as $group): ?>
                                
                                <div class="list-group-item">

                                    <div class="fw-bold">
                                        <?= htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8') ?>
                                    </div>

                                    <div class="text-muted">
                                        <?= htmlspecialchars($group['subject_name'], ENT_QUOTES, 'UTF-8') ?>
                                        -
                                        <?= htmlspecialchars($group['date'], ENT_QUOTES, 'UTF-8') ?>
                                        alle
                                        <?= htmlspecialchars(substr($group['time'], 0, 5), ENT_QUOTES, 'UTF-8') ?>
                                    </div>

                                    <?php if (!empty($group['description'])): ?>
                                        <div class="small mt-2">
                                            <?= htmlspecialchars($group['description'], ENT_QUOTES, 'UTF-8') ?>
                                        </div>
                                    <?php endif; ?>

                                </div>

                            <?php endforeach; ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center fw-bold py-3">
                    SESSIONI CREATE DA ME
                </div>

                <div class="card-body">
                    <div class="list-group">

                        <?php if (empty($createdGroups)): ?>

                            <div class="list-group-item text-center text-muted">
                                Nessuna sessione creata
                            </div>

                        <?php else: ?>

                            <?php foreach ($createdGroups as $group): ?>
                                <div class="list-group-item">
                                    <div class="fw-bold">
                                        <?= htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8') ?>
                                    </div>

                                    <div class="text-muted">
                                        <?= htmlspecialchars($group['subject_name'], ENT_QUOTES, 'UTF-8') ?>
                                        -
                                        <?= htmlspecialchars($group['date'], ENT_QUOTES, 'UTF-8') ?>
                                        alle
                                        <?= htmlspecialchars(substr($group['time'], 0, 5), ENT_QUOTES, 'UTF-8') ?>
                                    </div>

                                    <?php if (!empty($group['description'])): ?>
                                        <div class="small mt-2">
                                            <?= htmlspecialchars($group['description'], ENT_QUOTES, 'UTF-8') ?>
                                        </div>
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

</body>
</html>