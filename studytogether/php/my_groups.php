<?php
require_once __DIR__ . '/bootstrap.php';
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

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-info py-4">
    <div class="container-fluid px-5">
        <a class="navbar-brand fw-bold fs-1 text-black" href="home.php">
            STUDY GROUPS
        </a>

        <div class="d-flex gap-2">
            <a href="home.php" class="btn btn-study">HOME</a>
        </div>
    </div>
</nav>

<main class="container py-5">

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

                        <div class="list-group-item">
                            <div class="fw-bold">Codice gruppo</div>
                            <div class="text-muted">Materia - Data</div>
                        </div>

                        <div class="list-group-item text-center text-muted">
                            Nessuna sessione trovata
                        </div>

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

                        <div class="list-group-item">
                            <div class="fw-bold">Codice gruppo</div>
                            <div class="text-muted">Materia - Data</div>
                        </div>

                        <div class="list-group-item text-center text-muted">
                            Nessuna sessione creata
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