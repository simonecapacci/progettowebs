<?php
require_once __DIR__ . '/bootstrap.php';

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

<main class="container py-5 flex-grow-1">

    <section class="text-center mb-5">
        <h2 class="fw-bold">
            Benvenuto nella tua area personale
        </h2>
        <p class="text-muted">
            Gestisci i tuoi gruppi di studio in modo semplice e veloce.
        </p>
    </section>

    <section class="row justify-content-center g-4">

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body d-flex flex-column p-4">

                <h4 class="fw-bold mb-3">Cerca gruppo</h4>

                <p class="text-muted flex-grow-1">
                    Trova gruppi disponibili filtrando per materia.
                </p>

                <a href="search_group.php" class="btn btn-study w-100 mt-auto">
                    CERCA GRUPPO
                </a>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body d-flex flex-column p-4">

                <h4 class="fw-bold mb-3">Crea gruppo</h4>

                <p class="text-muted flex-grow-1">
                    Crea un nuovo gruppo di studio e organizza un incontro.
                </p>

                <a href="create_group.php" class="btn btn-study w-100 mt-auto">
                    CREA GRUPPO
                </a>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body d-flex flex-column p-4">

                <h4 class="fw-bold mb-3">I miei gruppi</h4>

                <p class="text-muted flex-grow-1">
                    Visualizza i gruppi a cui partecipi.
                </p>

                <a href="my_groups.php" class="btn btn-study w-100 mt-auto">
                    I MIEI GRUPPI
                </a>

                </div>
            </div>
        </div>

    </section>

</main>
    <?php require_once 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
