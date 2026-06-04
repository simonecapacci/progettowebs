<?php
require_once __DIR__ . '/bootstrap.php';

$navbarType = 'guest';
$error = null;
$success = null;
$username = '';
$email = '';

if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = (string) ($_POST['password'] ?? '');

    if ($username === '' || $email === '' || $password === '') {
        $error = 'Compila tutti i campi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Inserisci un indirizzo email valido.';
    } elseif (strlen($password) < 6) {
        $error = 'La password deve avere almeno 6 caratteri.';
    } elseif ($dbh->getUserByUsername($username)) {
        $error = 'Username già presente.';
    } elseif ($dbh->getUserByEmail($email)) {
        $error = 'Email già presente.';
    } else {
        if ($dbh->createUser($username, $email, $password)) {
            header('Location: login.php?registered=1');
            exit;
        }

        $error = 'Impossibile completare la registrazione.';
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - StudyTogether</title>
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
                        <h2 class="text-center fw-bold mb-4">Registrati</h2>

                        <?php if ($error !== null): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                            </div>
                        <?php endif; ?>

                        <form action="signup.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Registrati</button>
                        </form>

                        <hr>

                        <p class="text-center mb-0">Hai già un account?</p>

                        <a href="login.php" class="btn btn-outline-primary w-100 mt-2">Accedi</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
