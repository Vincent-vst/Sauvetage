<?php

require_once '../vendor/autoload.php';
require './config.php';

use GuzzleHttp\Client;

$code = isset($_GET['code']) ? htmlspecialchars($_GET['code']) : "";

$client = new Client([
  'timeout' => 2.0,
  'verify' => __DIR__.'/cacert.pem'
]);

try {
  $response = $client->request('GET', 'https://accounts.google.com/.well-known/openid-configuration');
  $discoveryJSON = json_decode((string)$response->getBody());  

  $response = $client->request('POST', $discoveryJSON->token_endpoint, [
    'form_params' => [
      'code' => $code,
      'client_id' => GOOGLE_AUTH_ID,
      'client_secret' => GOOGLE_AUTH_SECRET,
      'redirect_uri' => GOOGLE_AUTH_URI,
      'grant_type' => 'authorization_code'
    ]
  ]);
  $accessToken = json_decode($response->getBody())->access_token;

  $response = $client->request('GET', $discoveryJSON->userinfo_endpoint, [
    'headers' => [
      'Authorization' => 'Bearer '.$accessToken
    ]
  ]);
  $response = json_decode((string)$response->getBody());
  if ($response->email_verified) {
    session_start();
    $_SESSION['email'] = $response->email;
    dump($response);
    //header('Location: ./success.php'); // TODO
    //exit();
  }
}
catch (\GuzzleHttp\Exception\ClientException $exception) {
  echo $exception->getMessage();
}



