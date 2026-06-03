<?php
require_once __DIR__ . '/bootstrap.php';

$navbarType = 'guest';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyGroups</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">

<?php require_once 'navbar.php'; ?>

<main class="container py-5 flex-grow-1">

    <section class="card shadow-sm border-0 mb-5">
        <div class="card-body p-5 text-center">
            <h2 class="fw-bold mb-3">Benvenuto su Study Groups</h2>

            <p class="text-muted fs-5">
                Trova, crea e gestisci gruppi di studio con altri studenti.
            </p>

            <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
                <a href="login.php" class="btn btn-primary px-5">
                    Accedi
                </a>

                <a href="signup.php" class="btn btn-outline-primary px-5">
                    Registrati
                </a>
            </div>
        </div>
    </section>

    <section class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center p-4">
                    <h4 class="fw-bold">Cerca gruppo</h4>
                    <p class="text-muted">
                        Cerca gruppi di studio disponibili, filtrando materia per materia.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center p-4">
                    <h4 class="fw-bold">Crea gruppo</h4>
                    <p class="text-muted">
                        Crea tu un nuovo gruppo di studio per una materiaa tua scelta.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center p-4">
                    <h4 class="fw-bold">I miei gruppi</h4>
                    <p class="text-muted">
                        Visualizza i gruppi a cui partecipi e gli argomenti che andrai a trattare per ogni gruppo.
                    </p>
                </div>
            </div>
        </div>

    </section>

</main>
    <?php require_once 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>