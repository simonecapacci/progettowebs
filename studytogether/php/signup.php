<?php

require_once __DIR__ . '/api/api-signup.php';


$content_page = 'auth_page.php';

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

require './template/base.php';
?>