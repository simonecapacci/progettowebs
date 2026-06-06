<?php
require_once __DIR__ . '/bootstrap.php';

$navbarType = 'user';

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - StudyGroups</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <?php require_once 'navbar.php'; ?>

    <main class="container py-4 py-md-5 flex-grow-1">
        <section class="card shadow-sm border-0 overflow-hidden mb-4 mb-md-5">
            <div class="card-body p-0">
                <div class="px-3 px-md-4 py-4" style="background: linear-gradient(135deg, #1d4ed8 0%, #60a5fa 100%); color: #fff;">
                    <p class="text-uppercase fw-semibold small mb-1" style="letter-spacing: .12em; color: rgba(255,255,255,.82);">Area personale</p>
                    <h1 class="h3 mb-2">Benvenuto su StudyGroups</h1>
                    <p class="mb-0" style="color: rgba(255,255,255,.88);">Trova, crea e gestisci i tuoi gruppi di studio in modo semplice e veloce.</p>
                </div>
            </div>
        </section>

        <section class="row g-3 g-lg-4">
            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-0 h-100 group-result-card">
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-uppercase text-primary fw-semibold small mb-2">Ricerca</p>
                        <h2 class="h4 fw-bold mb-3">Cerca gruppo</h2>
                        <p class="text-body-secondary flex-grow-1 mb-4">Trova gruppi disponibili filtrando per materia o cercando direttamente nel nome.</p>
                        <a href="search_group.php" class="btn btn-primary w-100 group-action-btn mt-auto">Cerca gruppo</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-0 h-100 group-result-card">
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-uppercase text-primary fw-semibold small mb-2">Organizza</p>
                        <h2 class="h4 fw-bold mb-3">Crea gruppo</h2>
                        <p class="text-body-secondary flex-grow-1 mb-4">Crea un nuovo gruppo di studio e organizza un incontro con la tua classe.</p>
                        <a href="create_group.php" class="btn btn-primary w-100 group-action-btn mt-auto">Crea gruppo</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-0 h-100 group-result-card">
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-uppercase text-primary fw-semibold small mb-2">Partecipazione</p>
                        <h2 class="h4 fw-bold mb-3">I miei gruppi</h2>
                        <p class="text-body-secondary flex-grow-1 mb-4">Controlla i gruppi a cui sei iscritto e quelli che hai creato tu.</p>
                        <a href="my_groups.php" class="btn btn-primary w-100 group-action-btn mt-auto">I miei gruppi</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
