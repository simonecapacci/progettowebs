<?php

require_once __DIR__ . '/api/api-signup.php';


$templateParams['pageTitle'] = 'Sign Up';
$templateParams['content_page'] = './template/auth_card.php';

$templateParams['title'] = 'Registrati';
$templateParams['action'] = 'signup.php';

$templateParams['showEmail'] = true;

$templateParams['usernameValue'] = $username;
$templateParams['emailValue'] = $email;

$templateParams['submitText'] = 'Registrati';

$templateParams['bottomText'] = 'Hai già un account?';
$templateParams['bottomLink'] = 'login.php';
$templateParams['bottomButton'] = 'Accedi';

require './template/base.php';
?>