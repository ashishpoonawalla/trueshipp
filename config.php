<?php

//start session on web page
//session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('291633332145-p5jnukm6re0cpmn0n7nq378bv8v1rv1m.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('-59lLrIBFHCn3F-ORgyuFz_4');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/trueshipp/ULogin.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?> 