<?php
require_once __DIR__ . '/bootstrap.php';
$subjects = [];
if (isset($dbh) && method_exists($dbh, 'getSubjects')) {
    $subjects = $dbh->getSubjects();
}

$navbarType = 'user';

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea gruppo - StudyGroups</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-body-tertiary d-flex flex-column min-vh-100">
    <?php require_once 'navbar.php'; ?>

    <main class="container py-4 py-lg-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <div class="card-header bg-info text-dark border-0 py-4">
                        <p class="text-uppercase fw-semibold small mb-2">Nuovo gruppo</p>
                        <h2 class="h3 mb-2">Crea un gruppo di studio</h2>
                        <p class="mb-0">Raccogli in un unico posto nome, materia, descrizione e appuntamento.</p>
                    </div>

                    <div class="card-body p-4 p-lg-5">
                        <form method="post" action="" class="row g-3">
                            <div class="col-12">
                                <label for="group_name" class="form-label fw-semibold">Nome gruppo</label>
                                <input type="text" id="group_name" name="group_name" class="form-control form-control-lg" placeholder="Es. Algebra Sprint" required>
                            </div>

                            <div class="col-12">
                                <label for="subject_id" class="form-label fw-semibold">Materia</label>
                                <select id="subject_id" name="subject_id" class="form-control form-control-lg" required>
                                    <option value="">Seleziona una materia</option>

                                        <?php foreach ($subjects as $subject): ?>
                                        <option value="<?= $subject['id']; ?>">
                                        <?= htmlspecialchars($subject['name']); ?>
                                        </option>
                                        <?php endforeach; ?>

                                </select>
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label fw-semibold">Descrizione</label>
                                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Aggiungi una breve descrizione (facoltativa)"></textarea>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="event_date" class="form-label fw-semibold">Data</label>
                                <input type="date" id="event_date" name="event_date" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="event_time" class="form-label fw-semibold">Ora</label>
                                <input type="time" id="event_time" name="event_time" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-12 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg w-100">CREA GRUPPO</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
