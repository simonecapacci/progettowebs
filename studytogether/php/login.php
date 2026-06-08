<?php

require_once __DIR__ . '/api/api-login.php';

$templateParams['content_page'] = './template/auth_page.php';
$templateParams['pageTitle'] = 'Login';

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