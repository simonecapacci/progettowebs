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


$pageTitle = 'Login - StudyGroups';

$title = 'Accedi';
$action = 'login.php';

$showEmail = false;

$usernameValue = $identifier;
$emailValue = '';

$submitText = 'Accedi';

$bottomText = 'Non hai un account?';
$bottomLink = 'signup.php';
$bottomButton = 'Registrati';

require 'auth_page.php';
?>