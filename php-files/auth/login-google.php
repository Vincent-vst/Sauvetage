<?php

require '../base/config.php';
require './config.php';

if (!isset($_SESSION)) { 
  session_start();
}
$_SESSION['previous_page'] = isset($_GET['prev']) ? htmlspecialchars($_GET['prev']) : ROOT_URI;
header('Location: https://accounts.google.com/o/oauth2/v2/auth?scope=email profile&access_type=online&response_type=code&redirect_uri='.GOOGLE_AUTH_URI.'&client_id='.GOOGLE_AUTH_ID);
exit();
