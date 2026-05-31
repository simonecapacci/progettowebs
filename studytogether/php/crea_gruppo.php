<?php
require_once __DIR__ . '/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea gruppo - StudyGroups</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="create-page">
    <header class="top-bar">
        <h1>STUDY GROUPS</h1>
    </header>

    <main class="create-container">
        <form class="create-box" method="post" action="">
            <div class="create-card">
                <div class="create-card-head">
                    <p>Nuovo gruppo</p>
                    <h2>Crea un gruppo di studio</h2>
                    <span>Raccogli in un unico posto nome, materia, descrizione e appuntamento.</span>
                </div>

                <div class="create-card-body">
                    <label class="create-field">
                        <span>Nome gruppo</span>
                        <input type="text" name="group_name" placeholder="Es. Algebra Sprint" required>
                    </label>

                    <label class="create-field">
                        <span>Materia</span>
                        <input type="text" name="subject_name" placeholder="Es. Analisi" required>
                    </label>

                    <label class="create-field">
                        <span>Descrizione</span>
                        <textarea name="description" rows="4" placeholder="Aggiungi una breve descrizione (facoltativa)"></textarea>
                    </label>

                    <div class="create-inline">
                        <label class="create-field">
                            <span>Data</span>
                            <input type="date" name="event_date" required>
                        </label>

                        <label class="create-field">
                            <span>Ora</span>
                            <input type="time" name="event_time" required>
                        </label>
                    </div>

                    <button type="submit">CREA GRUPPO</button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>
