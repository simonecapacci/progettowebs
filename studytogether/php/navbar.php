<?php

if (isset($_SESSION['user_id'])) {
    $navbarType = ($_SESSION['role'] === 'admin') ? 'admin' : 'user';
} else {
    $navbarType = 'guest';
}

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">

        <span class="navbar-brand fw-bold">StudyGroups</span>

        <button class="navbar-toggler" type="button" 
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Apri menu">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav ms-4 align-items-lg-center gap-lg-1">

                <?php if ($navbarType === 'guest'): ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Index</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Accedi</a>
                    </li>

                    <li class="nav-item">
                        <a href="signup.php" class="btn btn-outline-light">Registrati</a>
                    </li>

                <?php elseif ($navbarType === 'user'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="search_group.php">Cerca Gruppo</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="my_groups.php">I Mie Gruppi</a>
                    </li>

                <?php elseif ($navbarType === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="search_group.php">Cerca Gruppo</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="my_groups.php">I Mie Gruppi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="admin_home.php">Admin Home</a>
                    </li>

                <?php endif; ?>

            </ul>

            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="ms-auto mt-3 mt-lg-0">
                    <div class="dropdown">
                        <button class="btn btn-light rounded-pill px-4 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                            <?= htmlspecialchars($_SESSION['username']) ?>

                        </button>

                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li>
                                <a class="dropdown-item text-danger" href="logout.php">
                                    Esci
                                </a>
                            </li>
                        </ul>


                    </div>

                </div>

            <?php endif; ?>


        </div>
    </div>
 </nav>
