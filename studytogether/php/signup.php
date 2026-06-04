<?php
require_once __DIR__ . '/bootstrap.php';

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

            <div class="col-mp-6 col-lg-4">

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h2 class="text-center fw-bold mb-4">
                            Registrati
                        </h2>

                        <form action="home.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-lable">
                                    Username
                                </label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="USERNAME" required>

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-lable">
                                    Email
                                </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL" required>

                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-lable">
                                    Password
                                </label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="PASSWORD" required>

                            </div>

                            <button type="submit" class="btn btn-primary w-100">Registrati</button>

                        </form>

                        <hr>

                        <p class="text-center mb-0">
                            Hai già un account?
                        </p>


                        <a href="login.php" class="btn btn-outline-primary w-100">
                            Accedi
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