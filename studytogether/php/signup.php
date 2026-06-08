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

$pageTitle = 'Sign Up - StudyTogether';

$title = 'Registrati';
$action = 'signup.php';

$showEmail = true;

$usernameValue = $username;
$emailValue = $email;

$submitText = 'Registrati';

$bottomText = 'Hai già un account?';
$bottomLink = 'login.php';
$bottomButton = 'Accedi';

require 'auth_page.php';
?>