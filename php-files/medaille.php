<?php
require("./model/BDD.class.php");
require("./model/Medaille.class.php");
require("./model/MedailleDAO.php");
$bdd = new BDD();
$MedailleDAO = new MedailleDAO($bdd);

if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $json_data["type"] = "medaille";
    $json_medaille = [];
    $medaille = $MedailleDAO->getById($_GET["id"]);
    $json_medaille["id"] = $medaille->get_medaille_id();
    $json_medaille["nom"] = $medaille->get_nom();
    $json_data["objet"] = [$json_medaille];

    echo json_encode($json_data);

}