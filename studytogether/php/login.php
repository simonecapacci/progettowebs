<?php

require_once __DIR__ . '/api/api-login.php';

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