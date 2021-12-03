<?php

require_once '../vendor/autoload.php';
require './config.php';
require '../base/config.php';
require '../model/BDD.class.php';

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
    if (!isset($_SESSION)) { 
      session_start();
    }
    $_SESSION['email'] = $response->email;
    $_SESSION['logged'] = true;

    $nameArray = explode(' ', $response->given_name, 2);
    $_SESSION['first_name'] = $nameArray[0];
    $_SESSION['last_name'] = $nameArray[1];

    $res = $bdd->execQuery("select * from acih_utilisateur where email = ?", [$_SESSION['email']]);
    //Already exists
    if (count($res) !== 0) {
      $_SESSION['is_admin'] = (bool)$res[0]["admin"];
    }
    // Does not exist
    else {
      $_SESSION['is_admin'] = false;
      $res = $bdd->execQuery("insert into acih_utilisateur values (?, ?, ?, ?)", [$_SESSION['email'], $_SESSION['last_name'], $_SESSION['first_name'], $_SESSION['is_admin']]);
    }

    $previousPage = isset($_SESSION['previous_page']) ? htmlspecialchars($_SESSION['previous_page']) : ROOT_URI;

    header('Location: '.$previousPage);
    exit();
  }
}
catch (\GuzzleHttp\Exception\ClientException $exception) {
  echo $exception->getMessage();
}



