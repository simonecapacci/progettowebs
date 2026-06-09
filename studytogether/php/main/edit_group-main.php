<main class="container py-4 py-md-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                <nav class="mb-4" aria-label="Navigazione area admin">
                    <a href="admin_home.php" class="btn btn-outline-secondary btn-sm">
                        Torna all'area admin
                    </a>
                </nav>

                <section class="card shadow-sm border-0 mb-4">
                    <header class="card-header text-white fw-bold py-3" style="background: linear-gradient(135deg, #2563eb 0%, #60a5fa 100%);">
                        Modifica gruppo
                    </header>

                    <div class="card-body p-4">
                        <form method="POST">
                            <input type="hidden" name="edit_group_id" value="<?= h((string) $group['id']) ?>">

                            <div class="mb-3">
                                <label for="group_name" class="form-label">Nome gruppo</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="group_name"
                                    name="group_name"
                                    value="<?= h($group['name']) ?>"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="group_description" class="form-label">Descrizione</label>
                                <textarea
                                    class="form-control"
                                    id="group_description"
                                    name="group_description"
                                    rows="4"
                                ><?= h($group['description'] ?? '') ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Salva modifiche
                            </button>
                        </form>
                    </div>
                </section>

                <section class="card shadow-sm border-0 mb-4">
                    <header class="card-header bg-light fw-bold py-3">
                        Iscritti al gruppo
                    </header>

                    <div class="card-body p-0">
                        <section class="list-group list-group-flush">
                            <?php if (empty($subscribers)): ?>
                                <div class="list-group-item text-secondary py-3">
                                    Nessun iscritto a questo gruppo.
                                </div>
                            <?php else: ?>
                                <?php foreach ($subscribers as $subscriber): ?>
                                    <article class="list-group-item py-3">
                                        <div class="fw-semibold">
                                            <?= h($subscriber['username']) ?>
                                        </div>

                                        <div class="text-secondary small">
                                            <?= h($subscriber['email'] ?? 'Email non disponibile') ?>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </section>
                    </div>
                </section>

                <section class="card shadow-sm border-0">
                    <header class="card-header bg-danger text-white fw-bold py-3">
                        Elimina gruppo
                    </header>

                    <div class="card-body p-4">
                        <p class="text-secondary">
                            Eliminando il gruppo verranno rimossi anche i collegamenti degli utenti iscritti.
                        </p>

                        <form method="POST" class="delete-group-form">
                            <input type="hidden" name="delete_group_id" value="<?= h((string) $group['id']) ?>">

                            <button type="submit" class="btn btn-danger">
                                Elimina
                            </button>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </main>
