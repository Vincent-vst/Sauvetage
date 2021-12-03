<?php

require '../base/config.php';

if (!isset($_SESSION)) {
  session_start();
}   


$json_data["type"] = "utilisateur";
$json_utilisateur = [];

$json_utilisateur["connecte"] = $_SESSION['logged'];
$json_utilisateur["email"] = $_SESSION['email'];
$json_utilisateur["prenom"] = $_SESSION['first_name'];
$json_utilisateur["nom"] = $_SESSION['last_name'];
$json_utilisateur["admin"] = $_SESSION['is_admin'];

$json_data["objet"] = $json_utilisateur;

echo json_encode($json_data);

