<?php
require_once __DIR__ . '/bootstrap.php';

$error = null;
$success = isset($_GET['registered']) && $_GET['registered'] === '1'
    ? 'Registrazione completata. Ora puoi accedere.'
    : null;
$identifier = '';

if (isset($_SESSION['user_id'])) {
    if (($_SESSION['role'] ?? 'user') === 'admin') {
        header('Location: admin_home.php');
    } else {
        header('Location: home.php');
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = trim($_POST['username'] ?? '');
    $password = (string)($_POST['password'] ?? '');

    if ($identifier === '' || $password === '') {
        $error = 'Inserisci username e password.';
    } else {
        $user = $dbh->authenticateUser($identifier, $password);

        if ($user) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header('Location: admin_home.php');
            } else {
                header('Location: home.php');
            }
            exit;
        }

        $error = 'Credenziali non valide.';
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StudyGroups</title>
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
                        <h2 class="text-center fw-bold mb-4">Accedi</h2>

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

                        <form action="login.php" method="post" novalidate>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= htmlspecialchars($identifier, ENT_QUOTES, 'UTF-8') ?>" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Accedi</button>
                        </form>

                        <hr>

                        <p class="text-center mb-0">Non hai un account?</p>

                        <a href="signup.php" class="btn btn-outline-primary w-100 mt-2">Registrati</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
