<?php

require_once __DIR__ . '/api/api-login.php';

$templateParams['content_page'] = './template/auth_card.php';
$templateParams['pageTitle'] = 'Login';

$templateParams['title'] = 'Accedi';
$templateParams['action'] = 'login.php';

$templateParams['showEmail'] = false;

$templateParams['usernameValue'] = $identifier;
$templateParams['emailValue'] = '';

$templateParams['submitText'] = 'Accedi';

$templateParams['bottomText'] = 'Non hai un account?';
$templateParams['bottomLink'] = 'signup.php';
$templateParams['bottomButton'] = 'Registrati';

require './template/base.php';
?>