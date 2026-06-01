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

            <h2>
                <?php echo htmlspecialchars($group['materia']); ?>
            </h2>

            <p class="group-organizer">
                <?php echo htmlspecialchars($group['organizzatore']); ?>
            </p>

            <p class="group-date">
                <?php echo $group['data']; ?>
                -
                <?php echo $group['ora']; ?>
                (<?php echo $group['durata']; ?>)
            </p>

            <p class="group-description">
                <?php echo htmlspecialchars($group['descrizione']); ?>
            </p>

            <p class="group-members">
                Partecipanti: <?php echo $group['partecipanti']; ?>
            </p>



        </section>

        <form action="iscriviti.php" method="post">
            <button class="home-button">
                ISCRIVITI
            </button>
        </form>

    </main>
</body>
</html>