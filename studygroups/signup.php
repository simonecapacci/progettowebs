<?php

require_once __DIR__ . '/api/api-signup.php';


$templateParams['pageTitle'] = 'Sign Up';
$templateParams['content_page'] = './template/auth_card.php';

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