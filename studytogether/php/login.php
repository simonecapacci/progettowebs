<?php

require_once __DIR__ . '/api/api-login.php';

$content_page = 'auth_page.php';

$pageTitle = 'Login';

$title = 'Accedi';
$action = 'login.php';

$showEmail = false;

$usernameValue = $identifier;
$emailValue = '';

$submitText = 'Accedi';

$bottomText = 'Non hai un account?';
$bottomLink = 'signup.php';
$bottomButton = 'Registrati';

require './template/base.php';
?>