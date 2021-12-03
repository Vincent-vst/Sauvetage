<?php

require '../base/config.php';

session_start();
$_SESSION['email'] = "";
$_SESSION['first_name'] = "";
$_SESSION['last_name'] = "";
$_SESSION['logged'] = false;
$_SESSION['is_admin'] = false;

$previousPage = isset($_GET['prev']) ? htmlspecialchars($_GET['prev']) : ROOT_URI;
header('Location: '.$previousPage);
exit();
