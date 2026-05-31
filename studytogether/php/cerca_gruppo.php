<?php
require_once __DIR__ . '/bootstrap.php';

$now = new DateTimeImmutable('first day of this month');
$months = [
    1 => 'Gennaio',
    2 => 'Febbraio',
    3 => 'Marzo',
    4 => 'Aprile',
    5 => 'Maggio',
    6 => 'Giugno',
    7 => 'Luglio',
    8 => 'Agosto',
    9 => 'Settembre',
    10 => 'Ottobre',
    11 => 'Novembre',
    12 => 'Dicembre',
];
$monthLabel = $months[(int) $now->format('n')] . ' ' . $now->format('Y');
$daysInMonth = (int) $now->format('t');
$startWeekday = (int) $now->format('N');
$weekdayLabels = ['Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab', 'Dom'];

$calendarCells = [];
for ($i = 1; $i < $startWeekday; $i++) {
    $calendarCells[] = null;
}

for ($day = 1; $day <= $daysInMonth; $day++) {
    $calendarCells[] = $day;
}

while (count($calendarCells) % 7 !== 0) {
    $calendarCells[] = null;
}

$subjects = [];
if (isset($dbh) && method_exists($dbh, 'getSubjects')) {
    $subjects = $dbh->getSubjects();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerca gruppo - StudyGroups</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="search-page">
    <header class="top-bar">
        <h1>STUDY GROUPS</h1>
    </header>

    <main class="search-layout">
        <section class="search-panel">
            <details class="subject-filter" open>
                <summary>Filtra per materia</summary>
                <div class="subject-list">
                    <?php if (!empty($subjects)): ?>
                        <?php foreach ($subjects as $subject): ?>
                            <label>
                                <input type="checkbox" name="subject[]" value="<?php echo htmlspecialchars($subject['name'], ENT_QUOTES, 'UTF-8'); ?>">
                                <?php echo htmlspecialchars($subject['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </label>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <label><input type="checkbox" name="subject[]" value="Analisi"> Analisi</label>
                        <label><input type="checkbox" name="subject[]" value="Programmazione"> Programmazione</label>
                        <label><input type="checkbox" name="subject[]" value="Basi di Dati"> Basi di Dati</label>
                    <?php endif; ?>
                </div>
            </details>

            <section class="results-list" aria-label="Risultati della ricerca">
                <a class="result-card" href="info_gruppo.php" aria-label="Apri il gruppo Studio Algebra">
                    <h2>Gruppo Studio Algebra</h2>
                    <p>Materia: Analisi</p>
                    <p>Mercoledì ore 15:00</p>
                </a>

                <a class="result-card" href="info_gruppo.php" aria-label="Apri il gruppo Web Dev Team">
                    <h2>Web Dev Team</h2>
                    <p>Materia: Tecnologie Web</p>
                    <p>Giovedì ore 18:30</p>
                </a>

                <a class="result-card" href="info_gruppo.php" aria-label="Apri il gruppo Database Sprint">
                    <h2>Database Sprint</h2>
                    <p>Materia: Basi di Dati</p>
                    <p>Venerdì ore 11:00</p>
                </a>
            </section>
        </section>

        <aside class="calendar-panel" aria-label="Calendario del mese corrente">
            <div class="calendar-header">
                <h2><?php echo htmlspecialchars($monthLabel, ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>

            <div class="calendar-grid calendar-weekdays">
                <?php foreach ($weekdayLabels as $weekday): ?>
                    <div class="calendar-cell weekday"><?php echo $weekday; ?></div>
                <?php endforeach; ?>
            </div>

            <div class="calendar-grid calendar-days">
                <?php foreach ($calendarCells as $cell): ?>
                    <?php if ($cell === null): ?>
                        <div class="calendar-cell empty"></div>
                    <?php else: ?>
                        <div class="calendar-cell day"><?php echo $cell; ?></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </aside>
    </main>
</body>
</html>
