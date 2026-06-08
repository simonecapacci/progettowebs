<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php require_once 'navbar.php'; ?>

    <main class="container py-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-7 col-lg-5 col-xl-4">

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">

                        <h2 class="text-center fw-bold mb-4">
                            <?= htmlspecialchars($title) ?>
                        </h2>

                        <?php if ($success !== null): ?>
                            <div class="alert alert-success" role="alert">
                                <?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($error !== null): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
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
                </div>

            </div>
        </div>
    </main>

    <?php require_once 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>