<?php

if (isset($_SESSION['user_id'])) {
    $navbarType = ($_SESSION['role'] === 'admin') ? 'admin' : 'user';
} else {
    $navbarType = 'guest';
}

$currentPage = basename($_SERVER['PHP_SELF']);

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold" href="<?= isset($_SESSION['user_id']) ? 'home.php' : 'index.php' ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                    <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                </svg>StudyGroups
        </a>

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
                        <a class="nav-link <?= $currentPage === 'index.php' ? 'active-page' : '' ?>" href="index.php">Index</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'login.php' ? 'active-page' : '' ?> " href="login.php">Accedi</a>
                    </li>

                    <li class="nav-item">
                        <a href="signup.php" class="btn btn-outline-light <?= $currentPage === 'signup.php' ? 'btn-active-page' : '' ?>">Registrati</a>
                    </li>

                <?php elseif ($navbarType === 'user'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'home.php' ? 'active-page' : '' ?>" href="home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'search_group.php' ? 'active-page' : '' ?>" href="search_group.php">Cerca Gruppo</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'my_groups.php' ? 'active-page' : '' ?>" href="my_groups.php">I Miei Gruppi</a>
                    </li>

                <?php elseif ($navbarType === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'home.php' ? 'active-page' : '' ?>" href="home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'search_group.php' ? 'active-page' : '' ?>" href="search_group.php">Cerca Gruppo</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'my_groups.php' ? 'active-page' : '' ?>" href="my_groups.php">I Miei Gruppi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link admin-link <?= $currentPage === 'admin_home.php' ? 'active-page' : '' ?>" href="admin_home.php">Admin Home</a>
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
