<?php

$googleAuthFile = file_get_contents(__DIR__."/../../vendor/google-oauth/code_secret_client_623328845042-eef01ilkd31391skt23189dn4lurnids.apps.googleusercontent.com.json");
$googleAuth = json_decode($googleAuthFile);

define('GOOGLE_AUTH_ID', (string)$googleAuth->web->client_id);
define('GOOGLE_AUTH_SECRET', (string)$googleAuth->web->client_secret);
define('GOOGLE_AUTH_URI', (string)$googleAuth->web->redirect_uris[0]);
