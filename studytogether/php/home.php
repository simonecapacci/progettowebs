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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="top-bar">
        <h1>STUDY GROUPS</h1>
    </header>

    <main class="home-container">

    <section class="home-menu">
        <a href="cerca_gruppo.php" class="home-button">CERCA GRUPPO</a>
        <a href="crea_gruppo.php" class="home-button">CREA GRUPPO</a>
        <a href="my_groups.php" class="home-button">I MIEI GRUPPI</a>
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