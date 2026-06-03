<?php
require_once __DIR__ . '/bootstrap.php';
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - StudyGroups</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<header class="top-bar d-flex align-items-center justify-content-between px-5">

    <h1>STUDY GROUPS</h1>

    <div>
        <a href="login.php" class="btn btn-study me-2">
            ACCEDI
        </a>

        <a href="registrazione.php" class="btn btn-study">
            REGISTRATI
        </a>
    </div>

</header>

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-auto">

            <div class="login-card text-center">

                <h2 class="fw-bold mb-5">
                    ACCEDI
                </h2>


    <div class="mb-3">
        <input
            type="text"
            class="form-control"
            placeholder="EMAIL / USERNAME">
    </div>

    <div class="mb-4">
        <input
            type="password"
            class="form-control"
            placeholder="PASSWORD">
    </div>

    <div class="text-center">
        <form action="home.php">
            <button type="submit" class="btn btn-study px-5">
                ACCEDI
            </button>
        </form>
    </div>

                <div class="mt-4">

                    <p class="mb-2">
                        Non hai un account?
                    </p>

                    <a href="signup.php"
                       class="btn btn-study btn-sm">
                        REGISTRATI
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>

