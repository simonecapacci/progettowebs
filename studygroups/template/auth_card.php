<main class="container py-5 flex-grow-1">

    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-7 col-lg-5 col-xl-4">

            <section class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <header>
                        <h2 class="text-center fw-bold mb-4">
                            <?= htmlspecialchars($title) ?>
                        </h2>
                    </header>

                    <?php if ($success !== null): ?>
                        <div class="alert alert-success">
                            <?= htmlspecialchars($success) ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($error !== null): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <?php require 'auth_form.php'; ?>

                    <hr>

                    <p class="text-center mb-0">
                        <?= htmlspecialchars($bottomText) ?>
                    </p>

                    <a href="<?= htmlspecialchars($bottomLink) ?>"
                    class="btn btn-outline-primary w-100 mt-2">
                        <?= htmlspecialchars($bottomButton) ?>
                    </a>

                </div>
            </section>

        </div>
    </div>

</main>
