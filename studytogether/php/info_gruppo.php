<?php
require_once __DIR__ . '/bootstrap.php';

//questo per non usare il DB ora
$group = [
    'materia' => 'Analisi Matematica',
    'organizzatore' => 'MarioRossi',
    'data' => '20/06/2025',
    'ora' => '15:00',
    'durata' => '2 ore',
    'descrizione' => 'Studio dei limiti ed esercizi sui teoremi fondamentali.',
    'partecipanti' => 8
];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info_goups</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="top-bar">
        <h1>STUDY GROUPS</h1>
    </header>
    
    <main class="group-layout">

        <section class="group-card">

            <div class="group-card-head">
                <h2><?php echo htmlspecialchars($group['materia']); ?></h2>
            </div>

            <div class="group-card-body">

                <div class="row">
                    <span class="label">Organizzatore</span>
                    <span class="value"><?php echo htmlspecialchars($group['organizzatore']); ?></span>
                </div>

                <div class="row">
                    <span class="label">Data / Ora</span>
                    <span class="value">
                        <?php echo $group['data']; ?> - <?php echo $group['ora']; ?>
                        (<?php echo $group['durata']; ?>)
                    </span>
                </div>

                <div class="description">
                    <?php echo htmlspecialchars($group['descrizione']); ?>
                </div>

                <div class="participants">
                    Numero partecipanti: <?php echo $group['partecipanti']; ?>
                </div>

            </div>

        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>