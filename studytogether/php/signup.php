<?php

require_once __DIR__ . '/api/api-signup.php';

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