<main class="container-fluid py-3 py-lg-4 flex-grow-1">
    <section class="row g-3 g-lg-4">

        <aside class="col-12 col-lg-4 col-xl-3">
            <section class="card border-0 shadow-sm h-100">
                <div class="card-body">

                    <header class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <p class="text-uppercase text-primary fw-semibold small mb-1">Filtri</p>
                            <h2 class="h5 mb-0">Filtra per materia</h2>
                        </div>
                    </header>

                    <section class="mb-3">
                        <label for="groupSearch" class="form-label fw-semibold small text-uppercase text-primary mb-2">
                            Cerca per nome
                        </label>
                        <input type="search" id="groupSearch" class="form-control form-control-lg" placeholder="Scrivi il nome del gruppo" autocomplete="off">
                    </section>

                    <nav class="accordion accordion-flush" id="subjectAccordion" aria-label="Filtri per materia">
                        <section class="accordion-item border rounded-3 overflow-hidden">
                            <h2 class="accordion-header" id="subjectHeading">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#subjectCollapse" aria-expanded="true" aria-controls="subjectCollapse">
                                    Materie disponibili
                                </button>
                            </h2>

                            <div id="subjectCollapse" class="accordion-collapse collapse show" aria-labelledby="subjectHeading" data-bs-parent="#subjectAccordion">
                                <section class="accordion-body p-3">
                                    <div class="vstack gap-2" id="subjectFilters">
                                        <?php if (!empty($subjects)): ?>
                                            <?php foreach ($subjects as $subject): ?>
                                                <label class="form-check d-flex align-items-center gap-2 mb-0">
                                                    <input class="form-check-input m-0 js-subject-filter" type="checkbox" value="<?= htmlspecialchars($subject['name'], ENT_QUOTES, 'UTF-8') ?>">
                                                    <span class="form-check-label"><?= htmlspecialchars($subject['name'], ENT_QUOTES, 'UTF-8') ?></span>
                                                </label>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p class="text-body-secondary small mb-0">Nessuna materia disponibile</p>
                                        <?php endif; ?>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </nav>

                </div>
            </section>
        </aside>

        <section class="col-12 col-lg-8 col-xl-9" aria-labelledby="groupsTitle">

            <header class="d-flex align-items-end justify-content-between mb-3 mb-lg-4">
                <div>
                    <p class="text-uppercase text-primary fw-semibold small mb-1">Risultati</p>
                    <h2 class="h4 mb-0" id="groupsTitle">Gruppi disponibili</h2>
                </div>

                <span class="text-body-secondary small d-none d-md-inline" id="groupsCount">
                    <?php echo count($groups); ?> gruppi trovati
                </span>
            </header>

            <section class="row g-3" id="groupsList">

                <section class="col-12 <?= empty($groups) ? '' : 'd-none' ?>" id="groupsEmptyState">
                    <article class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="h5 mb-2">Mi spiace, la ricerca non ha prodotto risultati</h3>
                            <p class="mb-0 text-body-secondary">Prova a cambiare il testo cercato o a togliere alcuni filtri.</p>
                        </div>
                    </article>
                </section>

                <?php if (!empty($groups)): ?>
                    <?php foreach ($groups as $group): ?>
                        <?php $subjectName = strtolower((string) ($group['subject_name'] ?? '')); ?>

                        <article class="col-12 group-item"
                                 data-name="<?= htmlspecialchars(strtolower((string) ($group['name'] ?? '')), ENT_QUOTES, 'UTF-8') ?>"
                                 data-subject="<?= htmlspecialchars($subjectName, ENT_QUOTES, 'UTF-8') ?>">

                            <section class="card shadow-sm border-0 group-result-card h-100">
                                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

                                    <section>
                                        <h3 class="h5 mb-2">
                                            <?= htmlspecialchars($group['name']) ?>
                                        </h3>

                                        <p class="mb-1 text-body-secondary">
                                            Materia: <?= htmlspecialchars($group['subject_name']) ?>
                                        </p>

                                        <p class="mb-0 text-body-secondary">
                                            <?= htmlspecialchars($group['date']) ?>
                                            -
                                            <?= htmlspecialchars($group['time']) ?>
                                        </p>
                                    </section>

                                    <?php
                                    $isSubscribed = false;
                                    $isCreator = false;

                                    if ($userId) {
                                        $isSubscribed = $dbh->isSubscribed($userId, $group['id']);
                                        $isCreator = ($group['creator_id'] == $userId);
                                    }
                                    ?>

                                    <?php if ($isCreator): ?>

                                        <button type="button" class="btn btn-secondary group-action-btn" disabled>
                                            Il Tuo Gruppo
                                        </button>

                                    <?php elseif ($isSubscribed): ?>

                                        <form method="POST" class="unsubscribe-form">
                                            <input type="hidden" name="unsubscribe_group_id" value="<?= htmlspecialchars($group['id'], ENT_QUOTES, 'UTF-8') ?>">

                                            <button type="submit" class="btn btn-danger group-action-btn">
                                                Disiscriviti
                                            </button>
                                        </form>

                                    <?php else: ?>

                                        <form action="subscribe_group.php" method="POST" onclick="event.stopPropagation();">
                                            <input type="hidden" name="group_id" value="<?= htmlspecialchars($group['id'], ENT_QUOTES, 'UTF-8') ?>">

                                            <button type="submit" class="btn btn-primary group-action-btn">
                                                Iscriviti
                                            </button>
                                        </form>

                                    <?php endif; ?>

                                </div>
                            </section>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>

            </section>
        </section>

    </section>
</main>
    


